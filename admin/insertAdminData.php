<?php
  //Connect to db
  require('db.php');
  $sql = "INSERT INTO admin_users (username,password,trn_date) VALUES ('cdbadmin', '".md5('cdbpw')."', '".date('Y-m-d H:i:s')."')";

  if ($con->query($sql) === TRUE) {
    echo "New admin records created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }


  //close connection
  $con->close();
?>