
<?php
$mysqli = require dirname(__FILE__, 2) . "/common/data.php";


if (isset($_GET["id"])) {
  $id = $_GET["id"];

  
  $sql = "DELETE FROM products WHERE id = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("i", $id);

  
  if ($stmt->execute()) {
      echo "Product deleted successfully";
  } else {
      echo "Error deleting product: " . $mysqli->error;
  }

  
  $stmt->close();
}
?>






