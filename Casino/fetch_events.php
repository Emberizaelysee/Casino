<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Casino";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT *  FROM `events`";
$result = $conn->query($sql);

$events = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

$conn->close();

echo json_encode($events);
?>
