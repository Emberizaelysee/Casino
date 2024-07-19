<?php
include "connection.php";

// Validate and sanitize input
if (isset($_GET['username'])) {
    $username = mysqli_real_escape_string($con, $_GET['username']);
    
    // Use prepared statement to prevent SQL injection
    $query = "DELETE FROM Booking WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $result = mysqli_stmt_execute($stmt);
    
    if ($result) {
        header("Location: page2.php");
        exit(); // Always exit after a header redirect
    } else {
        die("Error deleting record: " . mysqli_error($con));
    }
} else {
    die("Username parameter is missing.");
}
?>

