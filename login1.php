<?php
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Road Tolling System - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;
      transition: transform 0.3s ease-in-out;
    }

    .login-container:hover {
      transform: scale(1.05);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      height: 50px;
    }

    .btn-primary {
      width: 100%;
      height: 50px;
    }

    .logo {
      width: 100%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="login-container">
          <img src="./assets/img/car (1).png" alt="Road Tolling System Logo"
            style="width: 100px; height: auto; display: block; margin: 0 auto" />
          <h2 class="text-center mb-4">Login</h2>
          <form action="login.php" method="POST" name="form">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password"
                placeholder="Enter your password" />
            </div>
            <input type="submit" class="btn btn-primary" id="btn" name="submit" value="Login">
          </form>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>