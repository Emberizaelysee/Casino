<?php
$response = ['success' => false, 'errors' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $details = trim($_POST['details']);
    $cvName = $_FILES['cv']['name'];
    $cvTmpName = $_FILES['cv']['tmp_name'];
    $cvSize = $_FILES['cv']['size'];
    
    // Validation
    if (empty($fullName)) {
        $response['errors']['fullName'] = 'Full name is required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors']['email'] = 'Invalid email address.';
    }
    if (empty($details)) {
        $response['errors']['details'] = 'Details are required.';
    }
    if ($cvSize === 0) {
        $response['errors']['cv'] = 'CV is required.';
    } elseif ($cvSize > 50 * 1024 * 1024) {
        $response['errors']['cv'] = 'CV must be less than 50 MB.';
    }
    
    if (empty($response['errors'])) {
        // Move uploaded file
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($cvName);
        
        if (move_uploaded_file($cvTmpName, $targetFile)) {
            // Secure database connection
            $servername = "localhost";
            $username = "root"; 
            $password = ""; 
            $dbname = "casino";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                $response['errors']['database'] = "Connection failed: " . $conn->connect_error;
            } else {
                // Prepare SQL statement
                $sql = "INSERT INTO `hiring` (Full_name, Email, Details, CV) VALUES (?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Error preparing the statement: " . $conn->error);
                }
        
                // Lier les paramètres à la déclaration SQL
                $stmt->bind_param("ssss", $fullName, $email, $details, $cvName);
                
                // Execute SQL statement
                if ($stmt->execute()) {
                    $response['success'] = true;
                } else {
                    $response['errors']['database'] = "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close connection
                $stmt->close();
                $conn->close();
            }
        } else {
            $response['errors']['cv'] = 'Failed to upload CV.';
        }
    }
}

echo json_encode($response);
?>
