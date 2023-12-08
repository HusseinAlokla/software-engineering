<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_username = $_POST['username']; // Change variable name to match form field name
    $employee_email = $_POST['email']; // Change variable name to match form field name
    $employee_password = $_POST['password'];
    $employee_confirmpassword = $_POST['confirm_password']; // Assuming this field is for confirming password

    $stmt = $conn->prepare("INSERT INTO employees (username, email, password, confirmpassword) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $employee_username, $employee_email, $employee_password, $employee_confirmpassword); // Update bind_param accordingly
    $stmt->execute();
    $stmt->close();

    header("Location: login1.php");
    exit();
}
?>