<?php
require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM sgdb_users WHERE ID=$id"; 
$result = mysqli_query($con,$query);
header("Location: usersView"); 
?>