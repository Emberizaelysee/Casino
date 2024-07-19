<?php
require_once 'connection.php';
$response = ['success' => false, 'errors' => []];

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate form data
if (empty($_POST['hiring_name'])) {
    $response['errors']['hiringfullName'] = 'Name is required.';
}
if (empty($_POST['hiring_email'])) {
    $response['errors']['hiringemail'] = 'Email is required.';
} elseif (!filter_var($_POST['hiring_email'], FILTER_VALIDATE_EMAIL)) {
    $response['errors']['hiringemail'] = 'Invalid email format.';
}
if (empty($_POST['hiring_details'])) {
    $response['errors']['hiringdetails'] = 'Details are required.';
}
if (empty($_FILES['hiring_cv']['name'])) {
    $response['errors']['hiringcv'] = 'CV is required.';
} elseif ($_FILES['hiring_cv']['size'] > 50 * 1024 * 1024) {
    $response['errors']['hiringcv'] = 'CV must be less than 50 MB.';
}

if (empty($response['errors'])) {
    // Process the form data (e.g., save to database, send email)
    // Save uploaded CV file
    $target_dir =$_SERVER['DOCUMENT_ROOT'] . "/Website/uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $cv_file = $target_dir . basename($_FILES['hiring_cv']['name']);
    if (move_uploaded_file($_FILES['hiring_cv']['tmp_name'], $cv_file)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO hiring (Full_name, Email, Details, CV) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $details, $cv);

        // Set parameters and execute
        $name = $_POST['hiring_name'];
        $email = $_POST['hiring_email'];
        $details = $_POST['hiring_details'];
        $cv = $cv_file;

        if ($stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['errors']['database'] = 'Error inserting data: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        $response['errors']['hiringcv'] = 'Error uploading file.';
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
