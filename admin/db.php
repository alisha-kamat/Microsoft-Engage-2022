<?php
  // Enter your Host, username, password, database below.
  // Password left empty because none set on localhost.
  $con = mysqli_connect("127.0.0.1","root","","cdb");
  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  //else
  //  echo "Connection successful";
?>
