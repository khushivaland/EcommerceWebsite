<?php

$servername = "locakhost";
$username = "root";
$dbname = "SIGNUP";
$password = "";
  
$conn = mysqli_connect($servername, $username, $dbname, $password);
  

if (!$conn) {
    die("Connection failure: " 
        . mysqli_connect_error());
} 
echo "Connection Successfully.";
?>