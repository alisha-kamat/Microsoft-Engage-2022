<?php
require('db.php');
//include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Sales Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Sales Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
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


</body>
</html>