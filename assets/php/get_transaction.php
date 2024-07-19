<?php
// get_transaction.php !!!!!dropped!!!


// Database connection
require_once 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch transactions
$stmt = $mysqli->prepare("SELECT event, firstName, lastName, ticketId, seatNumber, room, price FROM transactions WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$transactions = [];

while ($row = $result->fetch_assoc()) {
    $transactions[] = $row;
}

echo json_encode($transactions);

// Close connection
$stmt->close();
$mysqli->close();
?>