<?php
require("db.php");
$sql = "DROP TABLE ct_jobs";
         
         if(mysqli_query($con, $sql)) {  
            echo " ct_jobs Table is deleted successfully<br>";  
         } else {  
            echo "ct jobs Table is not deleted successfully<br>";
         }  
		 
		 $sql = "DROP TABLE ct_users";
         
         if(mysqli_query($con, $sql)) {  
            echo " ct users Table is deleted successfully<br>";  
         } else {  
            echo "ct users Table is not deleted successfully<br>";
         }  
		 
		 $sql = "DROP TABLE ct_user_trail";
         
         if(mysqli_query($con, $sql)) {  
            echo " ct user_trail Table is deleted successfully<br>";  
         } else {  
            echo "ct user trail Table is not deleted successfully<br>";
         }  
?>