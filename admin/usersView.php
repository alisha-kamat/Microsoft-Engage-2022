<?php
  // Connect to database
  require('db.php');

  // Check if admin is logged in
  include("auth.php");  
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Users Records</title>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="../assets/img/cardb-logo.svg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!--link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet"-->
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Chart JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

   <!--Header-->
   <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="../homepage" class="logo d-flex align-items-center">
      <img src="../assets/img/cardb-logo.svg" alt="">
      <span class="d-none d-lg-block">CarDB Analytics</span>
    </a>
  </div><!-- End Logo -->
<span class="d-none d-lg-block"><p> <p><a href="adminHome">Admin Dashboard</a> 
| <a href="addUsersRecord">Add User</a> 
| <a href="adminLogout">Logout</a></p></span>

<nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            
            <?php 
                if(isset($_SESSION["admin_username"]))
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>".$_SESSION['admin_username']."</span>";
                }
                else
                {
                  echo "<span class='d-none d-md-block dropdown-toggle ps-2'>Guest</span>";
                }
            ?>
          </a><!-- End Profile Image Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php 
                if(isset($_SESSION["admin_username"]))
                {
                  echo "<h6>".$_SESSION['admin_username']."</h6>";
                  //echo "<span>".$_SESSION['admin_email']."</span>";
                }
                else
                {
                  echo "<h6>Guest</h6>";
                  echo "<span>Not logged in</span>";
                }
              ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!--li>
              <a class="dropdown-item d-flex align-items-center" href="faq">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li-->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="adminLogout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
</head>
<body>
<div class="form">
<section class="section">
<br><br><br>
<center><h2>View Users Records</h2></center>

      <div class="row">

          <div class="card">
            <div class="card-body">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th><strong>S.No</strong></th>
                    <th><strong>Username</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Password</strong></th>
                    <th><strong>Transaction Date</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                  </tr>
                </thead>
              <tbody>
              <?php
                $count=1;
                $sel_query="Select * from sgdb_users;";
                $result = mysqli_query($con,$sel_query);
                while($row = mysqli_fetch_assoc($result))
                 { ?>
                  <tr><td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row["username"]; ?></td>
                    <td align="center"><?php echo $row["email"]; ?></td>
                    <td align="center"><?php echo $row["password"]; ?></td>
                    <td align="center"><?php echo $row["trn_date"]; ?></td>
                    <td>
                    <a href="editUsersRecord?id=<?php echo $row["ID"]; ?>">Edit</a>
                    </td>
                    <td align="center">
                    <a href="deleteUsersRecord?id=<?php echo $row["ID"]; ?>">Delete</a>
                    </td>
                  </tr>
                <?php $count++; } 
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/chart.js/chart.min.js"></script>
<script src="../assets/vendor/echarts/echarts.min.js"></script>
<script src="../assets/vendor/quill/quill.min.js"></script>
<script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="../assets/vendor/tinymce/tinymce.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>