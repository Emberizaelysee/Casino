<?php
require_once 'connection.php'; // Inclut le fichier de connexion à la base de données

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

function validateInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$first_name = validateInput($_POST['floatingInput'] );
$last_name = validateInput($_POST['profileLastName'] );
$username = validateInput($_POST['profileUsername'] );
$password = validateInput($_POST['profilePassword'] );
$phone = validateInput($_POST['profilePhone'] );
$gender = validateInput($_POST['profileGender']);
$dob = validateInput($_POST['profileAge'] );
$avatar = validateInput($_POST['avatar'] );
$payment_info = validateInput($_POST['payment_info']);

$errors = [];

$dateOfBirth = new DateTime($dob);
$today = new DateTime();
$age = $today->diff($dateOfBirth)->y;
echo $age;

if (!(empty($age)) && $age < 18) {
        // Supprimer le compte utilisateur
        $delete_query = "DELETE FROM users WHERE User_ID = ?";
        $stmt = $conn->prepare($delete_query);
        $stmt->bind_param("i", $user_id);
    
        if ($stmt->execute()) {
            $_SESSION['error'] = "Votre profil a été définitivement supprimé car vous avez moins de 18 ans.";
            $stmt->close();
            $conn->close();
            header("Location: ../../index.html?alert=" . urlencode("Votre profil a été définitivement supprimé car vous avez moins de 18 ans."));
            exit();
        } else {
            $_SESSION['error'] = "Erreur lors de la suppression du profil.";
        }
    
        $stmt->close();
        $conn->close();
        exit();
}

if (empty($errors)) {
    // Mise à jour des informations utilisateur
    $query = "UPDATE users SET First_name = ?, Last_Name = ?, Username = ?, Phone = ?, Gender = ?, Birthday = ? WHERE User_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $first_name, $last_name, $username, $phone, $gender, $dob, $user_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Profile updated successfully!";
    } else {
        $_SESSION['error'] = "Error updating profile!: " . $stmt->error;
    }

    // Mise à jour de l'avatar
    if (!empty($avatar)) {
        $query_Avatar = "UPDATE users SET Avatar_path = ? WHERE User_ID = ?";
        $stmt_Avatar = $conn->prepare($query_Avatar);
        $stmt_Avatar->bind_param("si", $avatar, $user_id);
        if ($stmt_Avatar->execute()) {
            $_SESSION['success'] = "Avatar updated successfully!";
        } else {
            $_SESSION['error'] = "Error updating avatar: " . $stmt_Avatar->error;
        }
        $stmt_Avatar->close();
    }

    // Mise à jour du mot de passe
    if (!empty($password)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query_Pwd = "UPDATE users SET Passwords = ? WHERE User_ID = ?";
        $stmt_Pwd = $conn->prepare($query_Pwd);
        $stmt_Pwd->bind_param("si", $password_hash, $user_id);
        if ($stmt_Pwd->execute()) {
            $_SESSION['success'] = "Password updated successfully!";
        } else {
            $_SESSION['error'] = "Error updating password: " . $stmt_Pwd->error;
        }
        $stmt_Pwd->close();
    }

    if (!empty($payment_info)) {
        $query_payment = "UPDATE users SET Payment_Info = ? WHERE User_ID = ?";
        $stmt_payment  = $conn->prepare($query_payment );
        $stmt_payment ->bind_param("si", $payment_info , $user_id);
        if ($stmt_payment ->execute()) {
            $_SESSION['success'] = "payment updated successfully!";
        } else {
            $_SESSION['error'] = "Error updating payment : " . $stmt_payment ->error;
        }
        $stmt_payment ->close();
    }

    $stmt->close();
} else {
    echo json_encode(['error' => $errors]);
}

$conn->close();

header("Location: profile.php");
?>
