
<?php

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Build the SQL delete query
  $query = "DELETE FROM products WHERE id=$id";

  // Execute the query and check for errors
  if (mysqli_query($conn, $query)) {
    // Redirect to the product table page
    header("Location: products.php");
    exit();
  } else {
    // Display an error message
    echo "Error deleting product: " . mysqli_error($conn);
  }
}
?>