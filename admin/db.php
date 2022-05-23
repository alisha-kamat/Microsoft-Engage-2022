<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
//$con = mysqli_connect("127.0.0.1","bn_wordpress","9dacda7689","bitnami_wordpress");
$con = mysqli_connect("127.0.0.1","root","","sgdb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//else
//  echo "connecn successful";
?>
