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
    <h1 align="center">Colour-wise Sales</h1>
    <p align=center>Fine-tune your search using one or more filters</p>



    <center>
    <form action="#" method="post">
       <table cellpadding="5px" align="center">
       <tr>
       <th>Make</th>
       <th>Year</th>
       <th>Colour</th>
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
       <select name="colour" id="colour">
          <option value="">All</option>
          <option value="Colour_Dull">Dull</option>
          <option value="Colour_Bright">Bright</option>
          <option value="Colour_Neutral">Neutral</option>
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
<?php if(strlen($_POST['colour'])>0) { ?>
<th><strong><?php echo substr($_POST['colour'],7); ?></strong></th>
<?php } 
   else {?>
<th><strong>Dull</strong></th>
<th><strong>Bright</strong></th>
<th><strong>Neutral</strong></th>
<?php } ?>
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
<td><?php echo $row["Make"]; ?></td>
<td><?php echo $row["Model"]; ?></td>
<td><?php echo $row["Variant"]; ?></td>
<td><?php echo $row["Year"]; ?></td>
<td><?php echo $row["Total"]; ?></td>
<?php if(strlen($_POST['colour'])>0) { ?>
<td><?php echo $row[$_POST['colour']]; ?></td>
<?php } 
   else {?>
<td><?php echo $row["Colour_Dull"]; ?></td>
<td><?php echo $row["Colour_Bright"]; ?></td>
<td><?php echo $row["Colour_Neutral"]; ?></td>
<?php } ?>

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