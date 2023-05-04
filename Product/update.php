<?php

if (isset($_POST['update'])){


$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";

mysqli_query($mysqli, "UPDATE products SET name='$name', description='$description', price='$price',
              quantity='$quantity', category='$category', status='$status' WHERE id= $id");
    header("location:product.php");

}

// Handle the form submission
/*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    $mysqli = require dirname(__FILE__, 2) . "/common/data.php";

  
    // Validate and sanitize user input
    $name = mysqli_real_escape_string($mysqli, $name);
    $description = mysqli_real_escape_string($mysqli, $description);
    $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);
    $category = mysqli_real_escape_string($mysqli, $category);
    $status = mysqli_real_escape_string($mysqli, $status);
  
    // Build the SQL update query
    $query = "UPDATE products SET name='$name', description='$description', price=$price, quantity=$quantity, category='$category', status='$status' WHERE id=$id";
  
    // Execute the query and check for errors
    if (mysqli_query($mysqli, $query)) {
      // Redirect to the product table page
      header("Location: product.php");
      exit();
    } else {
      // Display an error message
      echo "Error updating product: " . mysqli_error($mysqli);
    }
  }*/
  
  ?>
  


