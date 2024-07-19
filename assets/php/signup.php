<?php

require_once 'connection.php';

// Vérification que les données POST sont définies
if (!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirm_password'])) {
    $response['message'] = 'Some fields are missing.';
    echo json_encode($response);
    exit();
}

// Récupération des données POST
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $first_name . $last_name;
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    $response['message'] = 'Passwords do not match.';
    echo json_encode($response);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = 'Invalid email format.';
    echo json_encode($response);
    exit();
}

// Vérifier si l'email est déjà enregistré
$stmt = $mysqli->prepare('SELECT COUNT(*) FROM users WHERE Email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    $response['message'] = 'Email already registered.';
    echo json_encode($response);
    exit();
}

// Préparer et exécuter la requête pour éviter les injections SQL
$stmt = $mysqli->prepare('INSERT INTO users (First_Name, Last_Name, Username, Email, Passwords) VALUES (?, ?, ?, ?, ?)');

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$stmt->bind_param('sssss', $first_name, $last_name, $username, $email, $hashed_password);

if ($stmt->execute()) {
    $response['success'] = true;
    $response['message'] = 'Registration successful.';
} else {
    $response['message'] = 'Registration failed: ' . $stmt->error;
}

$stmt->close();
$mysqli->close();

echo json_encode($response);

// Redirection vers la page de connexion
if ($response['success']) {
    header('Location: ../../login.html');
}
?>
