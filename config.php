<?php
$servername = "localhost";
$username = "root";
$password = ""; // If you've set a password for MySQL, enter it here
$dbname = "se_project";
$port = 3307; // Replace with your actual port number

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
