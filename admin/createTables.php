<?php
  // Connect to database
  require('db.php');

  // Create table Specs
  $sql = "CREATE TABLE IF NOT EXISTS Specs (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Make varchar(50) NOT NULL,
  Model varchar(50) NOT NULL,
  Variant varchar(50) NOT NULL,
  Ex_showroom_price int(11) NOT NULL,
  Cylinders int(11) NOT NULL,
  Drivetrain varchar(50) NOT NULL,
  Engine_location varchar(50) NOT NULL,
  Fuel_tank_capacity int(11) NOT NULL,
  Fuel_type varchar(50) NOT NULL,
  Body_type varchar(50) NOT NULL,
  City_mileage int(11) NOT NULL,
  Gears int(11) NOT NULL,
  Power varchar(50) NOT NULL,
  Torque varchar(50) NOT NULL,
  Seating_capacity int(11) NOT NULL,
  Transmission varchar(50) NOT NULL,
  Boot_space int(11) NOT NULL,
  PRIMARY KEY (Id)
  )";
  
  if ($con->query($sql) === TRUE) {
    echo "Table Specs created successfully<br>";
  } else {
    echo "Error creating table: " . $con->error;
  }
  
  // Create table Sales
  $sql = "CREATE TABLE IF NOT EXISTS Sales (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Make varchar(50) NOT NULL,
  Model varchar(50) NOT NULL,
  Variant varchar(50) NOT NULL,
  Year int(11) NOT NULL,
  Jan int(11) NOT NULL,
  Feb int(11) NOT NULL,
  Mar int(11) NOT NULL,
  Apr int(11) NOT NULL,
  May int(11) NOT NULL,
  Jun int(11) NOT NULL,
  Jul int(11) NOT NULL,
  Aug int(11) NOT NULL,
  Sep int(11) NOT NULL,
  Oct int(11) NOT NULL,
  Nov int(11) NOT NULL,
  Dcm int(11) NOT NULL,
  Total int(11) NOT NULL,
  PRIMARY KEY (ID)
  )";
  
  if ($con->query($sql) === TRUE) {
    echo "Table Sales created successfully<br>";
  } else {
    echo "Error creating table: " . $con->error;
  }


  // Create table Demography
  $sql = "CREATE TABLE IF NOT EXISTS Demography (
  ID int(11) NOT NULL AUTO_INCREMENT,
  Make varchar(50) NOT NULL,
  Model varchar(50) NOT NULL,
  Variant varchar(50) NOT NULL,
  Year int(11) NOT NULL,
  Total int(11) NOT NULL,
  Region_East int(11) NOT NULL,
  Region_West int(11) NOT NULL,
  Region_North int(11) NOT NULL,
  Region_South int(11) NOT NULL,
  Age_Young int(11) NOT NULL,
  Age_Middle int(11) NOT NULL,
  Age_Senior int(11) NOT NULL,
  Colour_Dull int(11) NOT NULL,
  Colour_Bright int(11) NOT NULL,
  Colour_Neutral int(11) NOT NULL,
  Gender_Male int(11) NOT NULL,
  Gender_Female int(11) NOT NULL,
  Gender_Other int(11) NOT NULL,
  PRIMARY KEY (ID)
  )";
  
  if ($con->query($sql) === TRUE) {
    echo "Table Demography created successfully<br>";
  } else {
    echo "Error creating table: " . $con->error;
  }

  // Create table Users
  $sql = "CREATE TABLE IF NOT EXISTS sgdb_users (
  ID int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  trn_date datetime NOT NULL,
  PRIMARY KEY (ID)
  )";
  
  if ($con->query($sql) === TRUE) {
    echo "Table Users created successfully<br>";
  } else {
    echo "Error creating table: " . $con->error;
  }

  // Create table Admin_users
  $sql = "CREATE TABLE IF NOT EXISTS admin_users (
  ID int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  trn_date datetime NOT NULL,
  PRIMARY KEY (ID)
  )";
  
  if ($con->query($sql) === TRUE) {
    echo "Table Admin Users created successfully<br>";
  } else {
    echo "Error creating table: " . $con->error;
  }

  /* For referential integrity */
  /* FOREIGN KEY (Make,Model,Variant) REFERENCES Specs(Make,Model,Variant) */

  //close connection
  $con->close();
?>