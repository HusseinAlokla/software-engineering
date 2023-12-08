<?php
include("config.php");


// Fetch user information with credit card details
$user_query = "SELECT client_tbl.ID, username, email,password, plate_number, phone_number, cardnumber
               FROM client_tbl
               LEFT JOIN payment_info ON client_tbl.Id = payment_info.ID";
$user_result = $conn->query($user_query);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        @media (max-width: 600px) {
            table {
                border: 0;
            }

            th,
            td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }

            th {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <h2>User Information</h2>
    <table border="1">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Vehicle Number</th>
            <th>Phone Number</th>
            <th>Credit Card Number</th>
        </tr>
        <?php
        while ($row = $user_result->fetch_assoc()) {
            echo "<tr><td>{$row['ID']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['password']}</td><td>{$row['plate_number']}</td><td>{$row['phone_number']}</td><td>{$row['cardnumber']}</td></tr>";
        }
        ?>
    </table>
</body>

</html>




<!--<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>


</head>

<body>
    <h2>User Information</h2>
    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Vehicle Number</th>
            <th>Phone Number</th>
            <th>Credit Card Number</th>
        </tr>
        <?php
        while ($row = $user_result->fetch_assoc()) {
            echo "<tr><td>{$row['ID']}</td><td>{$row['username']}</td><td>{$row['email']}</td><td>{$row['password']}</td><td>{$row['plate_number']}</td><td>{$row['phone_number']}</td><td>{$row['cardnumber']}</td></tr>";
        }
        ?>
    </table>
</body>

</html>-->