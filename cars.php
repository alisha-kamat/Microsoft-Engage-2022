<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Car Research</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

<?php
require('./admin/db.php');
require('header2.php');
?>

<body>


      <?php require('./menu.php'); ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Car Research</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Research</li>
          <li class="breadcrumb-item active">Car Research</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<!---cdb code begin-->
    <h1 align="center">Car Research</h1>
    <p align=center>Fine-tune your search using one or more filters</p>

    <center>
      <form action="#" method="post">
        <table cellpadding="5px" align="center">
          <tr>
            <th>Make</th>
            <th>Price</th>
            <th>Type</th>
            <th>Mileage</th>
            <th>Transmission</th>
            <th>Fuel</th>
            <th>Seats</th>
          </tr>
          <tr>
            <td>
              <select name="make" id="make">
                <option value="">All</option>
                  <?php
                    $sel_query="Select DISTINCT(Make) from specs;";
  	                $result = mysqli_query($con, $sel_query);
	                  while($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row["Make"]; ?>"><?php echo $row["Make"]; ?></option><?php } ?>
              </select>
            </td>
            <td>
        <select name="price" id="price">
	  <option value="">All</option>
          <?php
          $min_query="Select MIN(Ex_showroom_price) from specs;";
          $max_query="Select MAX(Ex_showroom_price) from specs;";
          $min_result = mysqli_query($con,$min_query);
          $min_row = mysqli_fetch_assoc($min_result);
          $max_result = mysqli_query($con,$max_query);
          $max_row = mysqli_fetch_assoc($max_result);
          $range = round(($max_row['MAX(Ex_showroom_price)']-$min_row['MIN(Ex_showroom_price)'])/10);
          $iter = 10;
          //echo $range;
          for($i = 1; $i<=$iter;$i++)
          {   
          //$sel_query="Select DISTINCT(Ex_showroom_price) from specs;";
	 // while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo round($i*$range/100000)*100000; ?>"><?php echo "Below ₹".round($i*$range/100000)." lakh"; ?></option><?php } ?>
       </select>
       </td>
       <td>
        <select name="body_type" id="body_type">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Body_type) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Body_type"]; ?>"><?php echo $row["Body_type"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="mileage" id="mileage">
	  <option value="">All</option>
          <?php
          //$sel_query="Select DISTINCT(City_mileage) from specs;";
          $sel_query="Select MAX(City_mileage) from specs;";
  	  $result = mysqli_query($con,$sel_query);
      $row = mysqli_fetch_assoc($result);
      $iter = $row['MAX(City_mileage)']/5 ;
      echo $row['MAX(City_mileage)'];
      $param = 5;
      for($i = 0; $i<$iter;$i++)
      { 
	  /*while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["City_mileage"]; ?>"><?php echo $row["City_mileage"]; ?></option><?php } ?>*/?>
          <option value="<?php echo $param*$i; ?>"><?php echo "Above ".$param*$i; ?></option>
          <?php 
          } 
          ?>       
          </select>
       </td>
       <td>
       <select name="transmission" id="transmission">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Transmission) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Transmission"]; ?>"><?php echo $row["Transmission"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="fuel" id="fuel">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Fuel_type) from specs;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Fuel_type"]; ?>"><?php echo $row["Fuel_type"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="seating_capacity" id="seating_capacity">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Seating_capacity) from specs order by Seating_capacity asc;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Seating_capacity"]; ?>"><?php echo $row["Seating_capacity"]; ?></option><?php } ?>
       </select>
       </td>
    </tr>
    </table>
        <br><input type="submit" value="Search">
    </form>
    </center>
    <br><br>
    <?php if (isset($_POST['fuel'])) { ?>
      <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
    <table class="table datatable">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Make</strong></th>
<th><strong>Model</strong></th>
<th><strong>Variant</strong></th>
<th><strong>Price</strong></th>
<!--th><strong>Cylinders</strong></th>
<th><strong>Drivetrain</strong></th>
<th><strong>Engine Location</strong></th>
<th><strong>Fuel Tank Capacity</strong></th-->
<th><strong>Fuel Type</strong></th>
<th><strong>Body Type</strong></th>
<th><strong>City Mileage</strong></th>
<!--th><strong>Gears</strong></th>
<th><strong>Power</strong></th>
<th><strong>Torque</strong></th>
<th><strong>Seating Capacity</strong></th-->
<th><strong>Transmission</strong></th>
<!--th><strong>Boot Space</strong></th-->
<th><strong>Details</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from specs";
$flag = 0;
if(isset($_POST['make'])) 
{
   if(strlen($_POST['make'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Make = '".$_POST['make']."'";
   }
   else
   {
   $sel_query .= " and Make = '".$_POST['make']."'";
   }
   }
}
if(isset($_POST['price'])) 
{
   if(strlen($_POST['price'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Ex_showroom_price <= '".$_POST['price']."'";
   }
   else
   {
   $sel_query .= " and Ex_showroom_price <= '".$_POST['price']."'";
   }
   }
}
if(isset($_POST['body_type'])) 
{
   if(strlen($_POST['body_type'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Body_type = '".$_POST['body_type']."'";
   }
   else
   {
   $sel_query .= " and Body_type = '".$_POST['body_type']."'";
   }
   }
}
if(isset($_POST['mileage'])) 
{
   if(strlen($_POST['mileage'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where City_mileage >= '".$_POST['mileage']."'";
   }
   else
   {
   $sel_query .= " and City_mileage >= '".$_POST['mileage']."'";
   }
   }
}
if(isset($_POST['transmission'])) 
{
   if(strlen($_POST['transmission'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Transmission = '".$_POST['transmission']."'";
   }
   else
   {
   $sel_query .= " and Transmission = '".$_POST['transmission']."'";
   }
   }
}
if(isset($_POST['fuel'])) 
{
   if(strlen($_POST['fuel'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Fuel_type = '".$_POST['fuel']."'";
   }
   else
   {
   $sel_query .= " and Fuel_type = '".$_POST['fuel']."'";
   }
   }
}
if(isset($_POST['seating_capacity'])) 
{
   if(strlen($_POST['seating_capacity'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Seating_capacity = '".$_POST['seating_capacity']."'";
   }
   else
   {
   $sel_query .= " and Seating_capacity = '".$_POST['seating_capacity']."'";
   }
   }
}
$sel_query .= ";";
//echo $sel_query;
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["Make"]; ?></td>
<td align="center"><?php echo $row["Model"]; ?></td>
<td align="center"><?php echo $row["Variant"]; ?></td>
<td align="center"><?php echo "₹".number_format($row["Ex_showroom_price"]); ?></td>
<!--td align="center"><?php //echo $row["Cylinders"]; ?></td>
<td align="center"><?php //echo $row["Drivetrain"]; ?></td>
<td align="center"><?php //echo $row["Engine_location"]; ?></td>
<td align="center"><?php //echo $row["Fuel_tank_capacity"]; ?></td-->
<td align="center"><?php echo $row["Fuel_type"]; ?></td>
<td align="center"><?php echo $row["Body_type"]; ?></td>
<td align="center"><?php echo $row["City_mileage"]; ?></td>
<!--td align="center"><?php //echo $row["Gears"]; ?></td-->
<!--td align="center"><?php// echo $row["Power"]; ?></td>
<td align="center"><?php //echo $row["Torque"]; ?></td>
<td align="center"><?php //echo $row["Seating_capacity"]; ?></td-->
<td align="center"><?php echo $row["Transmission"]; ?></td>
<!--td align="center"><?php //echo $row["Boot_space"]; ?></td-->
<td align="center">Click Here</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</section>
<?php } ?>
    <br>
<!--cdb code end-->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>CarDB</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by BootstrapMade
    </div>
  </footer><!-- End Footer -->

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