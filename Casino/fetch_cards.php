<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "casino";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Games_ID, Game_name, duration,description,rules,nbr_tables,nbr_seat,price, image FROM games";
$result = $conn->query($sql);

$cards = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cards[] = $row;
    }
}

$conn->close();

echo json_encode($cards);
?>
