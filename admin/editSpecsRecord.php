<?php
  // Connect to database
  require('db.php');

  // Check if admin is logged in
  include("auth.php");

  // Get Id of record to be updated
  $id=$_REQUEST['id'];
  $query = "SELECT * from Specs where ID='".$id."'"; 
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Specs Record</title>
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
<span class="d-none d-lg-block"><p> <p><a href="adminHome">Admin Dashboard</a> 
| <a href="addSpecsRecord">Add User</a> 
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
<br><br><br>
<center>
<h1>Update Specs Record</h1>
<br>
<?php
  $status = "";
  if(isset($_POST['new']) && $_POST['new']==1)
  {
    $id=$_REQUEST['id'];
    $Ex_showroom_price=$_REQUEST['Ex_showroom_price'];
    $Cylinders =$_REQUEST['Cylinders'];
    $Drivetrain =$_REQUEST['Drivetrain'];
    $Engine_location=$_REQUEST['Engine_location'];
    $Fuel_tank_capacity =$_REQUEST['Fuel_tank_capacity'];
    $Fuel_type =$_REQUEST['Fuel_type'];
    $Body_type=$_REQUEST['Body_type'];
    $City_mileage =$_REQUEST['City_mileage'];
    $Power =$_REQUEST['Power'];
    $Gears =$_REQUEST['Gears'];
    $Torque =$_REQUEST['Torque'];
    $Seating_capacity=$_REQUEST['Seating_capacity'];
    $Boot_space =$_REQUEST['Boot_space'];
    $Transmission =$_REQUEST['Transmission'];
    $update="update Specs set 
    Ex_showroom_price='".$Ex_showroom_price."', Cylinders='".$Cylinders."', Drivetrain='".$Drivetrain."', Engine_location='".$Engine_location."', Fuel_tank_capacity='".$Fuel_tank_capacity."', Fuel_type='".$Fuel_type."', Body_type='".$Body_type."', City_mileage='".$City_mileage."', Gears='".$Gears."', Power='".$Power."', Torque='".$Torque."', Seating_capacity='".$Seating_capacity."', Transmission='".$Transmission."', Boot_space='".$Boot_space."' where ID='".$id."'";
    //echo $update;
    mysqli_query($con, $update);
    $status = "Record Updated Successfully. </br></br>
    <a href='specsView'>View Updated Record</a>";
    echo '<p style="color:#FF0000;">'.$status.'</p>';
  }
  else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['ID'];?>" />
<table>
  <tr>
    <td><p>Ex Showroom Price: </td><td><input type="text" name="Ex_showroom_price" placeholder="Enter showroom price" 
    required value="<?php echo $row['Ex_showroom_price'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Cylinders: </td><td><input type="text" name="Cylinders" placeholder="Enter Cylinders" 
    required value="<?php echo $row['Cylinders'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Drivetrain: </td><td><input type="text" name="Drivetrain" placeholder="Enter Drivetrain" 
    required value="<?php echo $row['Drivetrain'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Engine Location: </td><td><input type="text" name="Engine_location" placeholder="Enter engine location" 
    required value="<?php echo $row['Engine_location'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Fuel Tank Capacity: </td><td><input type="text" name="Fuel_tank_capacity" placeholder="Enter fuel tank capacity" 
    required value="<?php echo $row['Fuel_tank_capacity'];?>" /></p></td>
  </tr>
  <tr>
   <td><p>Fuel Type: </td><td><input type="text" name="Fuel_type" placeholder="Enter fuel type" 
   required value="<?php echo $row['Drivetrain'];?>" /></p></td>
  </tr>
  <tr>
   <td><p>Body Type: </td><td><input type="text" name="Body_type" placeholder="Enter body type" 
    required value="<?php echo $row['Body_type'];?>" /></p></td>
  </tr>
  <tr>
   <td><p>City Mileage: </td><td><input type="text" name="City_mileage" placeholder="Enter city mileage" 
    required value="<?php echo $row['City_mileage'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Gears: </td><td><input type="text" name="Gears" placeholder="Enter Gears" 
    required value="<?php echo $row['Gears'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Power: </td><td><input type="text" name="Power" placeholder="Enter Power" 
    required value="<?php echo $row['Power'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Torque: </td><td><input type="text" name="Torque" placeholder="Enter Torque" 
    required value="<?php echo $row['Torque'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Seating Capacity: </td><td><input type="text" name="Seating_capacity" placeholder="Enter seating capacity" 
    required value="<?php echo $row['Seating_capacity'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Transmission: </td><td><input type="text" name="Transmission" placeholder="Enter Transmission" 
    required value="<?php echo $row['Transmission'];?>" /></p></td>
  </tr>
  <tr>
    <td><p>Boot Space: </td><td><input type="text" name="Boot_space" placeholder="Enter boot space" 
    required value="<?php echo $row['Boot_space'];?>" /></p></td>
  </tr>
</table>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
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