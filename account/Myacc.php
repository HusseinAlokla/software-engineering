<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link rel="stylesheet" href="ACC.css" />

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <div class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">User profile
        </div>
        <?php

        session_start();
        include("../config.php");



        $username = $_SESSION['username'];
        $user_id = $_SESSION['id'];
        //echo "$user_id";
        
        ?>

        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <div class="media align-items-center">
                <?php
                // Assuming $username contains the username
                // Replace with the actual username variable or value
                
                // Display the canvas avatar
                echo '<span class="avatar avatar-sm rounded-circle">';
                echo '<canvas id="userCanvas" width="50" height="50"></canvas>';
                echo '</span>';
                ?>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm font-weight-bold">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                  </span>
                </div>
              </div>
            </a>
            <!--<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>-->
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="
        min-height: 600px;
        background-image: url(../assets/img/Background.jpg);
        background-size: cover;
        background-position: center top;
      ">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello
              <?php echo htmlspecialchars($_SESSION['username']); ?>
            </h1>
            <p class="text-white mt-0 mb-5">
              This is your profile page. You can update your info, check your account, and edit some functionalities
            </p>
            <a href="#edit" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img id="profileImage" class="profile-image" src="path/to/profile/image.jpg"
                      alt="User Profile Image">
                    class="rounded-circle" />
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Transactions</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Balance</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Messages</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo htmlspecialchars($_SESSION['username']); ?>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Lebanon
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Driver

                </div>

                <hr class="my-4" />

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="settings.html" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">

              <h6 class="heading-small text-muted mb-4">User information</h6>
              <!--
                <hr class="my-4" />-->
              <?php
              include("../config.php");

              if (isset($_SESSION['id'])) {
                $user_id = $_SESSION['id'];

                // Example query to get user data
                $sql = "SELECT username, email, plate_number,phone_number FROM client_tbl WHERE ID = $user_id";
                $result = $conn->query($sql);

                if (!$result) {
                  die("Error in SQL query: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $username = $row['username'];
                  $email = $row['email'];
                  $vehicle_number = $row['plate_number'];
                  $phone_number = $row['phone_number'];
                  /*$first_name = $row['first_name'];
                  $last_name = $row['last_name'];*/
                } else {
                  // Handle the case where the user data is not found
                  $username = '';
                  $email = '';
                  $vehicle_number = '';

                }
              } else {
                // Handle the case where the user ID is not found in the session
                die("User ID not found in the session.");
              }

              $conn->close();
              ?>

              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Username</label>
                      <p>
                        <?php echo $username; ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label">Email address</label>
                      <p>
                        <?php echo $email; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Vehicle Number</label>
                      <p>
                        <?php echo $vehicle_number; ?>
                      </p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group focused">
                      <label class="form-control-label">Phone Number</label>
                      <p>
                        <?php echo $phone_number; ?>
                      </p>
                    </div>
                  </div>
                  <!-- Address -->



                  <hr class="my-4" />
                  <!-- Description -->




                  <form action='update.php' method='post'>
                    <section class="pl-lg-4" id="edit">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-username">Username</label>
                            <input type="text" id="input-username" class="form-control form-control-alternative"
                              name='username' placeholder="Username" value="<?php echo $username ?>" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="input-email" class="form-control form-control-alternative"
                              name='email' placeholder="email" value="<?php echo $email ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-first-name">Phone Number</label>
                            <input type="tel" id="input-phone-number" class="form-control form-control-alternative"
                              name='phone_number' placeholder="Phone Number" value="<?php echo $phone_number ?>" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label" for="input-last-name">Vehicle Number</label>
                            <input type="text" id="input-vehicle-number" class="form-control form-control-alternative"
                              name='vehicle_number' placeholder="Vehicle Number"
                              value="<?php echo $vehicle_number ?>" />
                          </div>
                        </div>
                        <button type="submit">Save Changes</button>
                      </div>
                    </section>
                    <?php
                    // Check for update success or error parameters
                    if (isset($_GET['update_success'])) {
                      echo "<p style='color: green;'>Update successful!</p>";
                    } elseif (isset($_GET['update_error'])) {
                      echo "<p style='color: red;'>Error updating record: " . htmlspecialchars($_GET['update_error']) . "</p>";
                    }
                    ?>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!--  <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6 m-auto text-center">
            <div class="copyright">
              <p>
                Made with
                <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a>
                by Creative Tim
              </p>
            </div>
          </div>
        </div>
      </footer>-->
      <script>
        // Replace 'username' with the actual username
        const username = '<?php echo $username; ?>';

        // Get the first 2 letters of the username
        const initials = username.slice(0, 2).toUpperCase();

        // Create a canvas element to generate the image
        const canvas = document.createElement('canvas');
        canvas.width = 100; // Adjust the width and height as needed
        canvas.height = 100;

        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#3498db'; // You can set a background color
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.fillStyle = '#ffffff'; // You can set a text color
        ctx.font = '30px Arial'; // Adjust the font size and family as needed
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(initials, canvas.width / 2, canvas.height / 2);

        // Convert the canvas to a data URL and set it as the source of the image
        const dataURL = canvas.toDataURL();
        document.getElementById('profileImage').src = dataURL;

        function drawUsernameAvatar(username) {
          var canvas = document.getElementById('userCanvas');
          var context = canvas.getContext('2d');

          // Draw a simple avatar with the first two letters of the username
          context.fillStyle = '#3498db'; // Use a color of your choice
          context.beginPath();
          context.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2, 0, 2 * Math.PI);
          context.fill();

          context.font = '20px Arial';
          context.fillStyle = 'white';
          context.textAlign = 'center';
          context.textBaseline = 'middle';

          // Display the first two letters of the username
          var initials = username.slice(0, 2).toUpperCase();
          context.fillText(initials, canvas.width / 2, canvas.height / 2);
        }

        // Call the function with the provided username
        drawUsernameAvatar("<?php echo $username; ?>");
      </script>

</body>