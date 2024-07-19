<?php

require_once 'connection.php';
require_once 'check_remember_me.php';
header('Content-Type: application/json');

$response = array();

// Check if the database connection is established
if ($mysqli->connect_error) {
    $response['success'] = false;
    $response['message'] = 'Database connection error: ' . $mysqli->connect_error;
    echo json_encode($response);
    exit();
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Prepare the SQL statement to avoid SQL injection
    if ($stmt = $mysqli->prepare("SELECT Username, Avatar_path FROM users WHERE User_ID = ?")) { // Make sure your table's column names are correct
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        
        // Get the result of the query
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $response['logged_in'] = true;
            $response['username'] = $user['Username']; // Ensure this matches your database column
            $response['avatar'] = './assets/img/avatar/' . $user['Avatar_path']; // Correct path to avatar
            $response['success'] = true;
        } else {
            $response['logged_in'] = false;
            $response['message'] = 'User not found';
            $response['success'] = false;
        }
        $stmt->close();
    } else {
        $response['logged_in'] = false;
        $response['message'] = 'Failed to prepare SQL statement';
        $response['success'] = false;
    }
} else {
    $response['logged_in'] = false;
    $response['success'] = true;
}

$mysqli->close();
echo json_encode($response);
?>
