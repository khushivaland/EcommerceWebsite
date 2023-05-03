<?php 
session_start();

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";

$stmt = $mysqli->prepare("INSERT INTO products (name, description, price, quantity, category, status) VALUES (?, ?, ?, ?, ?, ?)");

// Bind form data to placeholders in SQL statement
$stmt->bind_param("ssdiss", $name, $description, $price, $quantity, $category, $status);
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = $_POST['category'];
$status = $_POST['status'];

// Execute SQL statement
if ($stmt->execute()) {
  echo "Product added successfully!";
  header('Location: product.php');
  exit();
} else {
  echo "Error adding product: " . $stmt->error;
}

// Close database connection
$stmt->close();
?>


