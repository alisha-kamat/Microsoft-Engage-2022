<?php
require('./admin/db.php');
$id=$_REQUEST['id'];
$query = "SELECT * from Specs where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
echo $row['Make']." ".$row['Model']." ".$row['Variant'];
?>