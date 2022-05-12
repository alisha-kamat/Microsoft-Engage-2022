<?php
require('./admin/db.php');
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
    <br><br>
    <h1 align="center">Demography Analytics</h1>
    <p align=center>Fine-tune your search using one or more filters</p>



    <center>
    <form action="#" method="post">
       <table cellpadding="5px" align="center">
       <tr>
       <th>Make</th>
       <th>Year</th>
       <th>Demography</th>
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
       <select name="demography" id="demography">
          <option value="Region">Region</option>
          <option value="Age">Age</option>
          <option value="Colour">Colour</option>
          <option value="Gender">Gender</option>
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
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query = "Select * from demography";
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
   }
}



$sel_query .= ";";
echo $sel_query;
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
</tr>
<?php $count++; } ?>
</tbody>
</table>
<?php } ?>
    <br>
</body>
<section class="bg-dark text-light p-5 p-lg-3 pt-lg-5 text-center text-sm-start">
<?php include('footer.php'); ?>
</section>
</html>