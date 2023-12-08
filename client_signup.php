<?php
include 'config.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $plate_number = $_POST['plate_number']; // Retrieve plate number from form
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];

    $stmt = $conn->prepare("INSERT INTO client_tbl (username, email, password,  plate_number,phone_number) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssss", $username, $email, $password, $plate_number, $phone_number); // Update bind_param accordingly
    $stmt->execute();
    $stmt->close();

    header("Location: login1.php");
    exit();
}
?>