<?php
/*$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ctDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}*/
require('db.php');
$sql = "SELECT id, username, email, password, trn_date FROM ct_users";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]." ".  $row["username"]. " " . $row["email"]. " " . $row["password"] . " " . $row["trn_date"] . "<br>";
  }
} else {
  echo "0 results";
}
$con->close();
?>