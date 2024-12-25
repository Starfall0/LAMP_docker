<?php
$servername = "db"; // Use the service name defined in docker-compose.yml
$username = "admin"; // Username as defined in MYSQL_USER
$password = "admin"; // Password as defined in MYSQL_PASSWORD
$dbname = "myDB"; // Database name as defined in MYSQL_DATABASE

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
