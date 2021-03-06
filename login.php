<!DOCTYPE html>
<html lang="en">

<head>

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<?php 
  require('./admin/db.php'); 
  require('header2.php'); 
?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="homepage" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/cardb-logo.svg" alt="">
                  <span class="d-none d-lg-block">CarDB Analytics</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                <?php 
                session_start();
                // If form submitted, insert values into the database.
                if (isset($_POST['username']))
                {
                  // removes backslashes
                  $username = stripslashes($_REQUEST['username']);
                  //escapes special characters in a string
                  $username = mysqli_real_escape_string($con,$username);
                  $password = stripslashes($_REQUEST['password']);
                  $password = mysqli_real_escape_string($con,$password);
                  //Checking is user existing in the database or not
                  $query = "SELECT * FROM sgdb_users WHERE username='$username'
                  and password='".md5($password)."'";
                  $result = mysqli_query($con,$query) or die(mysqli_error($con));
                  $rows = mysqli_num_rows($result);
                    if($rows==1)
                    {
                      $_SESSION['username'] = $username;
                      $row = mysqli_fetch_assoc($result);
                      $_SESSION['email'] = $row['email'];
                      // Redirect user to dashboard if login successful
                      header("Location: dashboard");
                    }
                  else
                  {
                    echo "<br><center><span class='text-danger small pt-1 fw-bold'>Invalid Login details. Try again.</span></center>";
                  } 
                  }
                  ?>
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>