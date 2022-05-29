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
<title>View Specifications Records</title>
<!--link rel="stylesheet" href="css/style.css" /-->


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


   <!-- Header  -->
   <header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="../homepage" class="logo d-flex align-items-center">
      <img src="../assets/img/cardb-logo.svg" alt="">
      <span class="d-none d-lg-block">CarDB Analytics</span>
    </a>
  </div><!-- End Logo -->
<span class="d-none d-lg-block"><p><a href="adminHome">Admin Dashboard</a> 
| <a href="addSpecsRecord">Add Car</a> 
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

<?php
require('db.php');
?>

<body>

<div class="form">


<section class="section">
<br><br><br>
<center><h2>View Specifications Records</h2></center>
      <div class="row">

          <div class="card">
            <div class="card-body">
            <table class="table datatable">
              <thead>
                <tr>
                  <th><strong>S.No</strong></th>
                  <th><strong>Make</strong></th>
                  <th><strong>Model</strong></th>
                  <th><strong>Variant</strong></th>
                  <th><strong>Ex Showroom Price</strong></th>
                  <th><strong>Cylinders</strong></th>
                  <th><strong>Drivetrain</strong></th>
                  <th><strong>Engine Location</strong></th>
                  <th><strong>Fuel Tank Capacity</strong></th>
                  <th><strong>Fuel Type</strong></th>
                  <th><strong>Body Type</strong></th>
                  <th><strong>City Mileage</strong></th>
                  <th><strong>Gears</strong></th>
                  <th><strong>Power</strong></th>
                  <th><strong>Torque</strong></th>
                  <th><strong>Seating Capacity</strong></th>
                  <th><strong>Transmission</strong></th>
                  <th><strong>Boot Space</strong></th>
                  <th><strong>Edit</strong></th>
                  <th><strong>Delete</strong></th>
                </tr>
              </thead>
            <tbody>
            <?php
              $count=1;
              $sel_query="Select * from specs;";
              $result = mysqli_query($con,$sel_query);
              while($row = mysqli_fetch_assoc($result)) 
              { ?>
                <tr><td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row["Make"]; ?></td>
                <td align="center"><?php echo $row["Model"]; ?></td>
                <td align="center"><?php echo $row["Variant"]; ?></td>
                <td align="center"><?php echo "₹".number_format($row["Ex_showroom_price"]); ?></td>
                <td align="center"><?php echo $row["Cylinders"]; ?></td>
                <td align="center"><?php echo $row["Drivetrain"]; ?></td>
                <td align="center"><?php echo $row["Engine_location"]; ?></td>
                <td align="center"><?php echo $row["Fuel_tank_capacity"]; ?></td>
                <td align="center"><?php echo $row["Fuel_type"]; ?></td>
                <td align="center"><?php echo $row["Body_type"]; ?></td>
                <td align="center"><?php echo $row["City_mileage"]; ?></td>
                <td align="center"><?php echo $row["Gears"]; ?></td>
                <td align="center"><?php echo $row["Power"]; ?></td>
                <td align="center"><?php echo $row["Torque"]; ?></td>
                <td align="center"><?php echo $row["Seating_capacity"]; ?></td>
                <td align="center"><?php echo $row["Transmission"]; ?></td>
                <td align="center"><?php echo $row["Boot_space"]; ?></td>
                <td align="center">
                <a href="editSpecsRecord?id=<?php echo $row["Id"]; ?>">Edit</a>
                </td>
                <td align="center">
                <a href="deleteSpecsRecord?id=<?php echo $row["Id"]; ?>">Delete</a>
                </td>
                </tr>
                <?php $count++; } ?>
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