<?php
/*session_start();
include('config.php');

if (isset($_POST['submit'])) {

    $user = $_POST['username'];
    $pass = $_POST["password"];
    //echo "$user : $pass";
    $sql = "SELECT * from client_tbl WHERE USERNAME='$user' AND PASSWORD='$pass'";
    $result = mysqli_query($conn, $sql);
    //print($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    //echo "$count";
    if ($count == 1) {

        header("Location:index.html");

    } else {
        echo '<script>
         window.location.href = "login1.php" ;
         alret("login failed")
         </script>';
    }

}*/

include('config.php');
session_start();

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST["password"];

    // Use prepared statement to prevent SQL injection for the client_tbl
    $client_sql = "SELECT id, username FROM client_tbl WHERE USERNAME = ? AND PASSWORD = ?";
    $client_stmt = $conn->prepare($client_sql);
    $client_stmt->bind_param("ss", $user, $pass);
    $client_stmt->execute();
    $client_result = $client_stmt->get_result();

    // Check if login is successful in the client_tbl
    if ($client_result->num_rows == 1) {
        $client_row = $client_result->fetch_assoc();
        $_SESSION['id'] = $client_row['id'];
        $_SESSION['username'] = $client_row['username'];
        header("Location: signed_up_index.php");
        exit();
    } else {
        // If login fails in the client_tbl, check the employee table
        $employee_sql = "SELECT id, username FROM employees WHERE USERNAME = ? AND PASSWORD = ?";
        $employee_stmt = $conn->prepare($employee_sql);
        $employee_stmt->bind_param("ss", $user, $pass);
        $employee_stmt->execute();
        $employee_result = $employee_stmt->get_result();

        // Check if login is successful in the employee table
        if ($employee_result->num_rows == 1) {
            $employee_row = $employee_result->fetch_assoc();
            $_SESSION['id'] = $employee_row['id'];
            $_SESSION['username'] = $employee_row['username'];
            header("Location: UsersDataBase.php"); // Redirect to employee dashboard
            exit();
        } else {
            // Both client_tbl and employee login failed
            echo '<script>
                 window.location.href = "login1.php" ;
                 alert("Login failed");
                 </script>';
        }
    }

    $client_stmt->close();
    $employee_stmt->close();
}
?>