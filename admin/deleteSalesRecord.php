<?php
    // Connect to database
    require('db.php');
    $id=$_REQUEST['id'];
    $query = "DELETE FROM Sales WHERE ID=$id"; 
    $result = mysqli_query($con,$query);
    header("Location: salesView"); 
?>