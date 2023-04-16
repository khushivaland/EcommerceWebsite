<?php

$servername = "locakhost";
$username = "root";
$dbname = "signup_db";
$password = "";
  
$conn = mysqli_connect($servername, $username, $dbname, $password);
  

if (!$conn) {
    die("Connection failure: " 
        . mysqli_connect_error());
} 
echo "Connection Successfully.";
?>