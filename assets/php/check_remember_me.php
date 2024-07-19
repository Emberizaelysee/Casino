<?php
require_once 'connection.php';

// Créer une connexion
$conn = new mysqli($host, $user, $pass, $db);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 // Inclut le fichier de connexion à la base de données

if (isset($_COOKIE["t_user"])) { // Vérifie si le cookie "t_user" est défini
    $t_user = $_COOKIE["t_user"]; // Récupère la valeur du cookie "t_user"

    // Prépare une requête SQL pour sélectionner les informations de l'utilisateur en fonction du token
    $query = "SELECT User_Id,First_Name,Last_Name, Username, Email FROM users WHERE User_Token = ?";
    $stmt = $conn->prepare($query); // Prépare la requête
    $stmt->bind_param("s", $t_user); // Lie le paramètre du token utilisateur à la requête
    $stmt->execute(); // Exécute la requête
    $result = $stmt->get_result(); // Récupère le résultat de la requête
    if ($result->num_rows > 0) { // Vérifie si au moins une ligne est retournée
        $row = mysqli_fetch_assoc($result); // Récupère la ligne de résultat sous forme de tableau associatif
        
        // Réinitialise le token pour éviter les réutilisations
        setCookieToken($row["Username"]); // Appelle la fonction pour générer un nouveau token et mettre à jour le cookie

        // Stocke les informations utilisateur dans la session
        $_SESSION["user"]["id"] = $row["User_Id"];
        $_SESSION["user"]["name"] = $row["First_Name"];
        $_SESSION["user"]["username"] = $row["Username"];
        header("location:../../index.html"); // Redirige vers la page d'accueil
    }
    $stmt->close(); // Ferme la déclaration préparée
    $conn->close(); // Ferme la connexion à la base de données
}

function setCookieToken($username) { // Fonction pour réinitialiser le token utilisateur
    require_once 'connection.php'; 
    $t_user = uniqid(); // Génère un identifiant unique pour le token utilisateur
    // Prépare une requête SQL pour mettre à jour le token utilisateur

    // Créer une connexion
    $conn = new mysqli($host, $user, $pass, $db);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "UPDATE users SET User_Token = ? WHERE Username = ?";
    $stmt = $conn->prepare($query); // Prépare la requête
    $stmt->bind_param("ss", $t_user, $username); // Lie les paramètres du token et du nom d'utilisateur à la requête
    $stmt->execute(); // Exécute la requête
    $stmt->close(); // Ferme la déclaration préparée
    $conn->close(); // Ferme la connexion à la base de données
    setcookie("t_user", $t_user, time() + (86400 * 30), "/"); // Définit un nouveau cookie "t_user" valide pendant 30 jours
}
?>