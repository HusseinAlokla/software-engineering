<?php
// Ensure that you have started a session if needed

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "paymentDB";

// Create a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get card information from the form
    $cardNumber = $_POST["cardNumber"];
    $expiryDate = $_POST["expiryDate"];
    $cvv = $_POST["cvv"];
    $nameOnCard = $_POST["nameOnCard"];

    // Validate the data (you should perform more thorough validation)
    if (empty($cardNumber) || empty($expiryDate) || empty($cvv) || empty($nameOnCard)) {
        die("All fields are required.");
    }

    // Insert the card information into the database
    $sql = "INSERT INTO cards (cardNumber, expiryDate, cvv, nameOnCard) VALUES ('$cardNumber', '$expiryDate', '$cvv', '$nameOnCard')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment information saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
