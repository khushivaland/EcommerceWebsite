<?php

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";

if (isset($_GET['id'])) {

  $id = $_GET['id'];


  // Select data associated with this particular id
  $results = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");
} else {
  $results = mysqli_query($mysqli, "SELECT * FROM products");
}


$rows = [];
while ($row = mysqli_fetch_assoc($results)) {
  $rows[] = $row;
}


// Fetch the next row of a result set as an associative array

//print_r($resultData);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($rows);
