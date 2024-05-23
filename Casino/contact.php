<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "casino"; 

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

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
