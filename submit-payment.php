<?php
include 'config.php';
session_start();

$response = ['success' => false, 'message' => ''];

if (isset($_SESSION["id"])) {
    $userId = $_SESSION["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cardNumber = $_POST['cardNumber'];
        $expiryDate = $_POST['expiryDate'];
        $cvv = $_POST['cvv'];
        $nameOnCard = $_POST['nameOnCard'];

        // Check for existing card number
        $checkStmt = $conn->prepare("SELECT * FROM payment_info WHERE ID = ? AND cardnumber = ?");
        $checkStmt->bind_param("is", $userId, $cardNumber);
        $checkStmt->execute();
        $result = $checkStmt->get_result();
        $checkStmt->close();

        if ($result->num_rows > 0) {
            $response['message'] = "This card number has already been used.";
        } else {
            // Insert new card number
            $stmt = $conn->prepare("INSERT INTO payment_info (ID, cardnumber, expirydate, cvv, name_on_card) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $userId, $cardNumber, $expiryDate, $cvv, $nameOnCard);

            if ($stmt->execute()) {
                $response['success'] = true;
                $response['message'] = "Payment information stored successfully!";
            } else {
                $response['message'] = "Error storing payment information: " . $conn->error;
            }
            $stmt->close();
        }
        $conn->close();
    } else {
        $response['message'] = "User not logged in.";
    }
    echo json_encode($response);
}
?>