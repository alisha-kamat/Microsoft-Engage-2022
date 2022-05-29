<?php
  //Connect to db
    $con = mysqli_connect("127.0.0.1","root","","");
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  $sql = "CREATE database cdb";

  if ($con->query($sql) === TRUE) {
    echo "New db created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  require('createTables.php');
  require('insertAdminData.php');
  require('insertDemographicData.php');
  require('insertSalesData.php');
  require('insertSpecsData.php');
  
  //close connection
  //$con->close();
?>