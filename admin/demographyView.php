<?php
require('db.php');
//include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Demographic Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Demographic Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Make</strong></th>
<th><strong>Model</strong></th>
<th><strong>Variant</strong></th>
<th><strong>Year</strong></th>
<th><strong>Total</strong></th>
<th><strong>East Region</strong></th>
<th><strong>West Region</strong></th>
<th><strong>North Region</strong></th>
<th><strong>South Region</strong></th>
<th><strong>Young Age</strong></th>
<th><strong>Middle Age</strong></th>
<th><strong>Senior Age</strong></th>
<th><strong>Dull Colour</strong></th>
<th><strong>Bright Colour</strong></th>
<th><strong>Neutral Colour</strong></th>
<th><strong>Male Gender</strong></th>
<th><strong>Female Gender</strong></th>
<th><strong>Other Gender</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from demography;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["Make"]; ?></td>
<td align="center"><?php echo $row["Model"]; ?></td>
<td align="center"><?php echo $row["Variant"]; ?></td>
<td align="center"><?php echo $row["Year"]; ?></td>
<td align="center"><?php echo $row["Total"]; ?></td>
<td align="center"><?php echo $row["Region_East"]; ?></td>
<td align="center"><?php echo $row["Region_West"]; ?></td>
<td align="center"><?php echo $row["Region_North"]; ?></td>
<td align="center"><?php echo $row["Region_South"]; ?></td>
<td align="center"><?php echo $row["Age_Young"]; ?></td>
<td align="center"><?php echo $row["Age_Middle"]; ?></td>
<td align="center"><?php echo $row["Age_Senior"]; ?></td>
<td align="center"><?php echo $row["Colour_Dull"]; ?></td>
<td align="center"><?php echo $row["Colour_Bright"]; ?></td>
<td align="center"><?php echo $row["Colour_Neutral"]; ?></td>
<td align="center"><?php echo $row["Gender_Male"]; ?></td>
<td align="center"><?php echo $row["Gender_Female"]; ?></td>
<td align="center"><?php echo $row["Gender_Other"]; ?></td>
<td align="center">
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