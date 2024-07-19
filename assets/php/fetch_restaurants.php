<?php
require_once 'connection.php';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `resto`";
$result = $conn->query($sql);

$restaurants = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $restaurants[] = $row;
    }
}

$conn->close();

echo json_encode($restaurants);
?>
