<?php
require('../admin/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Sadi Gaddi</title>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <?php include('../header.php'); ?>
</head>
<body>
    <br><br>
    <h1 align="center">Region-wise Sales</h1>
    <p align=center>Fine-tune your search using one or more filters</p>



<div style="padding: 100px 0px 200px 0px;">
    <center>
    <form action="#" method="post">
       <table cellpadding="5px" align="center">
       <tr>
       <th>Make</th>
       <th>Year</th>
       <th>Region</th>
       </tr>
       <tr>
       <td>
        <select name="make" id="make">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Make) from Demography;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Make"]; ?>"><?php echo $row["Make"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="year" id="year">
	  <option value="">All</option>
          <?php
          $sel_query="Select DISTINCT(Year) from Demography;";
  	  $result = mysqli_query($con,$sel_query);
	  while($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row["Year"]; ?>"><?php echo $row["Year"]; ?></option><?php } ?>
       </select>
       </td>
       <td>
       <select name="region" id="region">
          <option value="">All</option>
          <option value="Region_East">East</option>
          <option value="Region_West">West</option>
          <option value="Region_North">North</option>
          <option value="Region_South">South</option>
       </select>
       </td>
    </tr>
    </table>
        <br><input type="submit" value="Search">
    </form>
    </center>
    
    <br><br>
    <?php if (isset($_POST['make'])) { ?>
    <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong></strong></th>
<th><strong>Make</strong></th>
<th><strong>Model</strong></th>
<th><strong>Variant</strong></th>
<th><strong>Year</strong></th>
<th><strong>Total</strong></th>
<?php if(strlen($_POST['region'])>0) { ?>
<th><strong><?php echo substr($_POST['region'],7); ?></strong></th>
<?php } 
   else {?>
<th><strong>East</strong></th>
<th><strong>West</strong></th>
<th><strong>North</strong></th>
<th><strong>South</strong></th>
<?php } ?>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from demography";
$query = "Select distinct(Demography.Year), Specs.Fuel_Type, sum(Region_East), sum(Region_West), sum(Region_North), sum(Region_South), Fuel_type from Specs, Demography where Specs.Make = Demography.Make and Specs.Model = Demography.Model and Specs.Variant = Demography.Variant";// group by Specs.Fuel_type"; 
//echo $query;


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
   $query .= " and Demography.Make = '".$_POST['make']."'";
   }
}
if(isset($_POST['year'])) 
{
   if(strlen($_POST['year'])>0)
   {
   if($flag == 0)
   {
   $flag = 1;
   $sel_query .= " where Year = '".$_POST['year']."'";
   }
   else
   {
   $sel_query .= " and Year = '".$_POST['year']."'";
   }
   $query .= " and Demography.Year = ".$_POST['year'];
   }
}


$sel_query .= ";";
$query .=  " group by Specs.Fuel_type;";
echo $sel_query;
echo "<br>";
echo $query; 
$tbl_count=0;
?>

//echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"];

//}
//echo $data;
//?>
    <h2 align="center">Grouped Bar Chart</h2>
<div style="position: relative; height:30vh; width:50vw; padding: 50px 0px 2000px 0px;">
<canvas id="bar-chart-grouped" width="800" height="450"></canvas>

<script>
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
      labels: ["East", "West", "North", "South"],
      datasets: [
          <?php 
          $result = mysqli_query($con,$query);
	$data = "";
	while($row = mysqli_fetch_assoc($result)) { if($tbl_count>0) {echo ",";} ?>
        {
          label: "<?php echo $row["Fuel_Type"]; ?>",
          backgroundColor: "#3e95cd",
          data: [<?php echo $row["sum(Region_East)"].", ".$row["sum(Region_West)"].", ".$row["sum(Region_North)"].", ".$row["sum(Region_South)"]; ?>]
        }<?php $tbl_count++; } ?>
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Region-wise Fuel'
      }
    }
});

</script>
</div>

<?php

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td><?php echo $row["Make"]; ?></td>
<td><?php echo $row["Model"]; ?></td>
<td><?php echo $row["Variant"]; ?></td>
<td><?php echo $row["Year"]; ?></td>
<td><?php echo $row["Total"]; ?></td>
<?php if(strlen($_POST['region'])>0) { ?>
<td><?php echo $row[$_POST['region']]; ?></td>
<?php } 
   else {?>
<td><?php echo $row["Region_East"]; ?></td>
<td><?php echo $row["Region_West"]; ?></td>
<td><?php echo $row["Region_North"]; ?></td>
<td><?php echo $row["Region_South"]; ?></td>
<?php } ?>

</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
<?php } ?>
    <br>

</body>
<section class="bg-dark text-light p-5 p-lg-3 pt-lg-5 text-center text-sm-start">
<?php include('../footer.php'); ?>
</section>
</html>