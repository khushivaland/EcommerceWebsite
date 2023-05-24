<?php

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";

$pageLimit = 4;
$start = 0;
$finish = $pageLimit;

if (isset($_GET['id'])) {

  $id = $_GET['id'];


  // Select data associated with this particular id
  $results = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");
} else if (isset($_GET['page_id'])) {
  $pageId = $_GET['page_id'];

  $start = ($pageLimit*$pageId) + 1;
  $finish = $start + ($pageLimit-1);



  $results = mysqli_query($mysqli, "SELECT * FROM products LIMIT $start, $pageLimit");
} else {
  $results = mysqli_query($mysqli, "SELECT * FROM products LIMIT $start, $pageLimit");
}


$rows = [];
while ($row = mysqli_fetch_assoc($results)) {
  $rows[] = $row;
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($rows);
