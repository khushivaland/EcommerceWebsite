<?php

session_start();

if (isset($_GET['id'])) {


    /*if(isset($_SESSION['id'])) { 
    $product_id = $_SESSION['id']; 

    
    
    $mysqli = require dirname(__FILE__, 2) . "/common/data.php";
  
    
    $query = "SELECT * FROM products WHERE name = $product_id";
    $result1 = $mysqli->query($query);
    $product = $result1->fetch_assoc(); 
    print_r($product);
    return;
  }

  $id = $_GET['id'];

  $sql = "SELECT * FROM products WHERE id = $id";
$results = mysqli_query($mysqli, $sql);
$rows = mysqli_fetch_assoc($results);*/

    $id = $_GET['id'];

    $mysqli = require dirname(__FILE__, 2) . "/common/data.php";
    // Select data associated with this particular id
    $results = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");

    // Fetch the next row of a result set as an associative array
    $resultData = mysqli_fetch_assoc($results);

    print_r($resultData);

    $name = $resultData['name'];
    $description = $resultData['description'];
    $price = $resultData['price'];
    $quantity = $resultData['quantity'];
    $category = $resultData['category'];
    $status = $resultData['status'];    
}
