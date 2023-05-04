<?php

session_start();

if (isset($_GET['id'])) {

  $id = $_GET['id'];

  $mysqli = require dirname(__FILE__, 2) . "/common/data.php";
  // Select data associated with this particular id
  $results = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");

  // Fetch the next row of a result set as an associative array
  $resultData = mysqli_fetch_assoc($results);

  //print_r($resultData);

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($resultData);


  $name = $resultData['name'];
  $description = $resultData['description'];
  $price = $resultData['price'];
  $quantity = $resultData['quantity'];
  $category = $resultData['category'];
  $status = $resultData['status'];
}else{
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $status = $_POST['status'];
  
    $sql = "UPDATE products SET name='$name', description='$description', price='$price', quantity='$quantity', category='$category', status='$status' WHERE id='$id'";
  
    if ($mysqli->query($sql) === TRUE) {
      echo "Product updated successfully";
    } else {
      echo "Error updating product: " . $mysqli->error;
    }
  }
}
