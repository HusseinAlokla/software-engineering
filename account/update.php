<?php
include('../config.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $newUsername = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $vehicle_number = $_POST['vehicle_number'];

    // Update the database (replace with your actual update query)
    $user_id = $_SESSION['id']; // Replace with the actual user ID
    $update_query = "UPDATE client_tbl SET username = ?, email = ?, phone_number = ?, plate_number = ? WHERE id = ?";

    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssi", $newUsername, $email, $phone_number, $vehicle_number, $user_id);

    if ($stmt->execute()) {
        $_SESSION['username'] = $newUsername;
        header("Location: Myacc.php?update_success=1");
    } else {
        header("Location: Myacc.php?update_error=" . urlencode($stmt->error));
    }

}

$conn->close();
?>