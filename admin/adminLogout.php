<?php
   session_start();
   unset($_SESSION["admin_username"]);
   unset($_SESSION["admin_password"]);
   
   header('Refresh: 1; URL = adminLogin');
?>