<?php
$mysqli = require dirname(__FILE__, 2) . "/common/data.php";


  $results = mysqli_query($mysqli, "SELECT  COUNT(*) AS total FROM products");
  




// while ($row = mysqli_fetch_assoc($results)) {
//   $rows[] = $row;
// }
$results = mysqli_query($mysqli, "SELECT * FROM products");
if(mysqli_num_rows($results) > 0){
  $total_records = mysqli_num_rows($results);
  $limit = 4;
  $total_page = ceil($total_records / $limit);
  //echo $total_page;
}



header('Content-Type: application/json; charset=utf-8');
echo json_encode($total_page);
