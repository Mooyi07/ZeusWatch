<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zeuswatch_db";

    date_default_timezone_set('Asia/Manila');
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
?>