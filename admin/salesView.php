<?php
require('db.php');
//include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Sales Records</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<center><h2>View Sales Records</h2></center>
<section class="section">
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
<th><strong>Year</strong></th>
<th><strong>Jan</strong></th>
<th><strong>Feb</strong></th>
<th><strong>Mar</strong></th>
<th><strong>Apr</strong></th>
<th><strong>May</strong></th>
<th><strong>Jun</strong></th>
<th><strong>Jul</strong></th>
<th><strong>Aug</strong></th>
<th><strong>Sep</strong></th>
<th><strong>Oct</strong></th>
<th><strong>Nov</strong></th>
<th><strong>Dec</strong></th>
<th><strong>Total</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from sales;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["Make"]; ?></td>
<td align="center"><?php echo $row["Model"]; ?></td>
<td align="center"><?php echo $row["Variant"]; ?></td>
<td align="center"><?php echo $row["Year"]; ?></td>
<td align="center"><?php echo $row["Jan"]; ?></td>
<td align="center"><?php echo $row["Feb"]; ?></td>
<td align="center"><?php echo $row["Mar"]; ?></td>
<td align="center"><?php echo $row["Apr"]; ?></td>
<td align="center"><?php echo $row["May"]; ?></td>
<td align="center"><?php echo $row["Jun"]; ?></td>
<td align="center"><?php echo $row["Jul"]; ?></td>
<td align="center"><?php echo $row["Aug"]; ?></td>
<td align="center"><?php echo $row["Sep"]; ?></td>
<td align="center"><?php echo $row["Oct"]; ?></td>
<td align="center"><?php echo $row["Nov"]; ?></td>
<td align="center"><?php echo $row["Dcm"]; ?></td>
<td align="center"><?php echo $row["Total"]; ?></td>
<td>
<a href="edit.php?id=<?php echo $row["ID"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["ID"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</div></div>
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