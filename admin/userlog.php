<?php
session_start();
require('db.php');
//if($_SESSION['username'])
//{
?><!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>welcome</title>
</head>
<body>
<!--p><a href="welcome.php">Welcome : <?php echo $_SESSION['username'];?> </a>| <a href="logout.php">Logout</a> </p-->
<table align="center" border="1" cellpadding = "5">
<tr>
<th>Sno.</th>
<th>User Name</th>
<th>User IP</th>
<th>Action Performed</th>
<th>Login Time</th>
<th>Unique Id</th>
</tr>
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

$sql = "select * from ct_user_trail;";// where id='".$_SESSION['id']."'";
//echo $sql;
$result = $con->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
	  {
		  echo "<tr>";
    echo "<td>" . $row["id"]."</td>";
	echo "<td>" . $row["username"]. "</td>";
	echo "<td>" . $row["ip_address"]. "</td>";
	echo "<td>" . $row["page"] . "</td>";
	echo "<td>" . $row["trn_date"] . "</td>";
	echo "<td>" . $row["u_id"] . "</td>";
	echo "<tr>";
  }
  
} else {
  echo "0 results";
}
$con->close();
/*
 $query=mysqli_query($con,"select * from user_trail where id='".$_SESSION['id']."'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['username'];?></td>
<td><?php echo $row['ip_address'];?></td>
<td><?php echo $row['page'];?></td>
<td><?php echo $row['trn_date'];?></td>
</tr>*/
$cnt=1;
 $cnt=$cnt+1;
?>
</table>
</body>
</html>
<?php/*} else{
//header('location:ctlogout1.php');
}*/
?>