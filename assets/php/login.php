<?php

require_once 'connection.php';
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Lire et décoder les données JSON de la 
$data_raw = file_get_contents('php://input');
file_put_contents('log.txt', $data_raw); // Enregistrer le JSON brut reçu
$data = json_decode($data_raw, true);

if (json_last_error() !== JSON_ERROR_NONE) {
   
    $response = ['success' => false, 'message' => 'JSON Decode Error: ' . json_last_error_msg()];
    echo json_encode($response);
    exit();
}

if ($data === null) {
    $response = ['success' => false, 'message' => 'Invalid JSON received.'];
    echo json_encode($response);
    exit();
}

$email = isset($data['email']) ? $data['email'] : null;
$password = isset($data['password']) ? $data['password'] : null;
$rememberMe = isset($data['rememberMe']) ? $data['rememberMe'] : false;

$response = ['success' => false, 'message' => ''];

// Vérification de l'email et du mot de passe
if ($email === null || $password === null) {
    $response['message'] = 'Email and password are required.';
    echo json_encode($response);
    exit();
}


// Validation de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = 'Invalid email format.';
    echo json_encode($response);
    exit();
}

// Vérification de la longueur du mot de passe
if (strlen($password) < 6) {
    $response['message'] = 'Password must be at least 6 characters long.';
    echo json_encode($response);
    exit();
}

// Préparation de la requête SQL pour sélectionner l'utilisateur par email
$stmt = $mysqli->prepare('SELECT * FROM users WHERE Email = ?');
if ($stmt === false) {
    $response['message'] = 'Prepare failed: ' . $mysqli->error;
    echo json_encode($response);
    exit();
}

$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    $response['message'] = 'Execute failed: ' . $stmt->error;
    echo json_encode($response);
    exit();
}

// Vérification de l'existence de l'utilisateur
if ($result->num_rows === 0) {
    $response['message'] = 'Invalid email or password.';
    echo json_encode($response);
    exit();
}

$user = $result->fetch_assoc();

// Vérification du mot de passe
if (!password_verify($password, $user['Passwords'])) { // Assurez-vous que 'Passwords' est le nom correct de la colonne
    $response['message'] = 'Invalid email or password.';
    echo json_encode($response);
    exit();
}

// Initialiser la session utilisateur
$_SESSION['user_id'] = $user['User_Id'];
$_SESSION['username'] = $user['Username'];
$_SESSION['email'] = $user['Email'];
$_SESSION['access_lvl'] = $user['Access_lvl'];
$_SESSION['first_name'] = $user['First_Name'];
$_SESSION['last_name'] = $user['Last_Name'];
$_SESSION['user_token'] = $user['User_Token'];

// Définir le cookie de session si "Remember me" est coché
if ($rememberMe) {
    $t_user = uniqid(); // Génère un identifiant unique pour l'utilisateur
    $stmt = $mysqli->prepare("UPDATE users SET User_Token = ? WHERE Username = ?");
    
    // Vérifier la préparation de la requête
    if ($stmt === false) {
        $response = ['success' => false, 'message' => 'Prepare failed: ' . $mysqli->error];
        echo json_encode($response);
        exit();
    }
    
    $stmt->bind_param("ss", $t_user, $user['Username']);
    
    // Exécuter la mise à jour
    $result = $stmt->execute();
    
    // Vérifier l'exécution de la requête
    if ($result === false) {
        $response = ['success' => false, 'message' => 'Execute failed: ' . $stmt->error];
        echo json_encode($response);
        exit();
    }
    
    $stmt->close();
    
    // Définir le cookie avec une durée de vie de 30 jours
    setcookie("t_user", $t_user, time() + (86400 * 30), "/");
}


// Définir la redirection basée sur le niveau d'accès
if ($user['Access_lvl'] == 0) {
    $response['redirect_url'] = './assets/php/profile.php';
} elseif ($user['Access_lvl'] == 1) {
    $response['redirect_url'] = './assets/php/admin_dashboard.php';
}

$response['success'] = true;

echo json_encode($response);

$mysqli->close();
?>
