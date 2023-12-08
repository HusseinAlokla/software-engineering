<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // You can perform validation on the data here if needed
  // For example, checking if required fields are filled

  // Set recipient email address
  $to = "hussein77.alokla@gmail.com"; // Replace with the recipient's email address

  // Set email headers
  $headers = "From: $email" . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

  // Send the email
  if (mail($to, $subject, $message, $headers)) {
    // Email sent successfully
    echo "success";
  } else {
    // Email sending failed
    echo "error";
  }
} else {
  // If the request method is not POST, handle accordingly (e.g., show an error)
  echo "Invalid request method";
}
?>