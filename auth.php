<?php
    session_start();
    if(!isset($_SESSION["username"]))
    {
        // Redirect to login if session not set
        header("Location: login");
        exit(); 
    }
?>