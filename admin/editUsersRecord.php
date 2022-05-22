<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from sgdb_users where ID='".$id."'"; 
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
//$trn_date = date("Y-m-d H:i:s");
$username =$_REQUEST['username'];
$email =$_REQUEST['email'];
$password =$_REQUEST['password'];
$trn_date = date("Y-m-d H:i:s");
$update="update sgdb_users set 
username='".$username."', email='".$email."', password='".md5($password)."', trn_date='".$trn_date."' where ID='".$id."'";
 //echo $update;
mysqli_query($con, $update);
$status = "Record Updated Successfully. </br></br>
<a href='usersView.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['ID'];?>" />
<p><input type="text" name="username" placeholder="Enter Username" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" name="email" placeholder="Enter Email" 
required value="<?php echo $row['email'];?>" /></p>
<p><input type="text" name="password" placeholder="Enter Password" 
required value="<?php echo $row['password'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>