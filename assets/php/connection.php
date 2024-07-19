<?php
session_start();

// Initialiser la réponse par défaut
$response = ['success' => false, 'message' => ''];

// Informations de connexion à la base de données
$host = 'localhost';
$db = 'casino_db';
$user = 'root';
$pass = '';

// Créer une nouvelle connexion MySQLi
$mysqli = new mysqli($host, $user, $pass, $db);

// Vérifier les erreurs de connexion
if ($mysqli->connect_error) {
    $response['message'] = 'Database connection failed: ' . $mysqli->connect_error;
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
    // Afficher une erreur simple pour les utilisateurs non-AJAX
    die('Database connection failed: ' . $mysqli->connect_error);
}

// Si la connexion est réussie, mettez à jour la réponse
$response['success'] = true;
$response['message'] = 'Database connection successful';

// Vérifier si la requête est une requête AJAX
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>