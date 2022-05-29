<?php
    // Connect to database
    require('db.php');
    $id=$_REQUEST['id'];
    $query = "DELETE FROM Demography WHERE ID=$id"; 
    $result = mysqli_query($con,$query);
    header("Location: demographyView"); 
?>