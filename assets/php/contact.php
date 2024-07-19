<?php
require_once 'connection.php';

// Créer une connexion
$conn = new mysqli($host, $user, $pass, $db);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['contact_name']) ? $_POST['contact_name'] : '';
    $email = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
    $message = isset($_POST['contact_message']) ? $_POST['contact_message'] : '';

    if (!empty($name) && !empty($email) && !empty($message)) {
        // Préparer une déclaration SQL
        $stmt = $conn->prepare("INSERT INTO contact (Full_name, Email, Message) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing the statement: " . $conn->error);
        }

        // Lier les paramètres à la déclaration SQL
        $stmt->bind_param("sss", $name, $email, $message);

        // Exécuter la déclaration SQL
        if ($stmt->execute()) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Please fill in all fields.";
    }
}

$conn->close();
?>
