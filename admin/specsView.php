<?php
require('db.php');
//include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Specifications Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Specifications Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
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
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["Make"]; ?></td>
<td align="center"><?php echo $row["Model"]; ?></td>
<td align="center"><?php echo $row["Variant"]; ?></td>
<td align="center"><?php echo $row["Ex_showroom_price"]; ?></td>
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
<a href="edit.php?id=<?php echo $row["Id"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?id=<?php echo $row["Id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>