<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['profilePic']['name'])) {
        // Directory to store uploaded images
        $uploadDirectory = 'C:\xampp\htdocs\Selecao\uploads';

        // Ensure the directory exists
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $targetPath = $uploadDirectory . basename($_FILES['profilePic']['name']);

        if (move_uploaded_file($_FILES['profilePic']['tmp_name'], $targetPath)) {
            // Image uploaded successfully
            $imagePath = $targetPath;
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            ob_start();
            include("../config.php");
            ob_end_clean();


            // Check if the connection was successful
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Prepare an SQL statement to insert the image path into your table
            $sql = "INSERT INTO client_db (image_path) VALUES (?)";

            // Create a prepared statement
            $stmt = $mysqli->prepare($sql);

            if ($stmt) {
                // Bind the parameter (image path) to the statement
                $stmt->bind_param("s", $imagePath);

                // Execute the statement
                if ($stmt->execute()) {
                    // Image path saved to the database successfully
                    echo json_encode(['message' => 'File uploaded successfully and path saved to the database.']);
                } else {
                    // Error occurred while executing the statement
                    echo json_encode(['message' => 'Error saving image path to the database: ' . $stmt->error]);
                }

                // Close the statement
                $stmt->close();
            } else {
                // Error occurred while preparing the statement
                echo json_encode(['message' => 'Error preparing the database statement: ' . $mysqli->error]);
            }

            // Close the database connection
            $mysqli->close();
        } else {
            // Error occurred while moving the uploaded file
            echo json_encode(['message' => 'Error moving uploaded file.']);
        }
    } else {
        // No files were uploaded
        echo json_encode(['message' => 'No files were uploaded.']);
    }
}
?>