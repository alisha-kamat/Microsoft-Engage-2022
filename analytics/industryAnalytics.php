<?php
require('./admin/db.php');
//include("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Sadi Gaddi</title>

    <?php include('header.php'); ?>
</head>
<body>
    <section class="bg-dark text-light p-5 p-lg-3 pt-lg-5 text-center text-sm-start">
    <h1 align="center">Industry Analytics</h1>
    <br>
    <p align="center">This feature is available only to registered users</p>
    <p align="center">Registration takes only a minute!</p>
    <br>
    <center>
    <a href="register.php">
      <button type="button" style="background:#003166;color:white;">
        Register Here
      </button>
    </a>
    </center>
    <br>
    <p align="center">If you’re already a registered user, <a href="login.php">log in here</a></p>
    </section>
    <br>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Make</strong></th>
<th><strong>Model</strong></th>
<th><strong>Variant</strong></th>
<th><strong>Year</strong></th>
<th><strong>Total</strong></th>
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
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from sales;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td><?php echo $row["Make"]; ?></td>
<td><?php echo $row["Model"]; ?></td>
<td><?php echo $row["Variant"]; ?></td>
<td><?php echo $row["Year"]; ?></td>
<td><?php echo $row["Total"]; ?></td>
<td><?php echo $row["Jan"]; ?></td>
<td><?php echo $row["Feb"]; ?></td>
<td><?php echo $row["Mar"]; ?></td>
<td><?php echo $row["Apr"]; ?></td>
<td><?php echo $row["May"]; ?></td>
<td><?php echo $row["Jun"]; ?></td>
<td><?php echo $row["Jul"]; ?></td>
<td><?php echo $row["Aug"]; ?></td>
<td><?php echo $row["Sep"]; ?></td>
<td><?php echo $row["Oct"]; ?></td>
<td><?php echo $row["Nov"]; ?></td>
<td><?php echo $row["Dcm"]; ?></td>

</tr>
<?php $count++; } ?>
</tbody>
</table>
</body>
<section class="bg-dark text-light p-5 p-lg-3 pt-lg-5 text-center text-sm-start">
<?php include('footer.php'); ?>
</section>
</html>