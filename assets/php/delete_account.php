<?php

require_once 'connection.php';


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo 'error';
    exit;
}

$user_id = $_SESSION['user_id'];

// Delete user from the database
$stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    session_destroy();
    echo 'success';
} else {
    echo 'error';
}

// Close connection
$stmt->close();
$mysqli->close();
?>