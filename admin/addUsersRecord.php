<?php
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1){
    //$trn_date = date("Y-m-d H:i:s");
    $job_name =$_REQUEST['job_name'];
    $job_desc = $_REQUEST['job_desc'];
	$salary = $_REQUEST['salary'];
	$category = $_REQUEST['category'];
    $submittedby = $_SESSION["username"];
    $ins_query="insert into ct_jobs
    ('job_name','job_desc','salary','category')values
    ('$job_name','$job_desc','$salary','$category')";
    mysqli_query($con,$ins_query)
    or die("error");//***
    $status = "New Record Inserted Successfully.
    </br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> 
| <a href="view.php">View Records</a> 
| <a href="logout.php">Logout</a></p>
<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="job_name" placeholder="Enter Job Name" required /></p>
<p><input type="text" name="job_desc" placeholder="Enter Job Desc" required /></p>
<p><input type="text" name="salary" placeholder="Enter Salary" required /></p>
<p><input type="text" name="category" placeholder="Enter Category" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</div>
</div>
</body>
</html>
