<?php 
session_start();
if(!isset($_SESSION["user_id"]) ){
  header("Location: ../Login/login.php");
}

$result = $_SESSION["user_name"];

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";
$sql = "SELECT * FROM products";
$result1 = mysqli_query($mysqli, $sql);
//$row = $result1->fetch_assoc();
while ($row = mysqli_fetch_assoc($result1)) {
  $name = $row['name'];
  $description = $row['description'];
  $price = $row['price'];
  $quantity = $row['quantity'];
  $category = $row['category'];
  $status = $row['status'];
} 
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="product.css">
    <title>Product</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Welcome!!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../Product/product.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">about</a>  
        </li>
      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class='bx bxs-user-circle'></i>
        <span>
          <?php 
           echo $result;
          ?>
        </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../dashboard/dashboard.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
          </ul>
      </li>
      </ul>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
    <h3>Product</h3>
    <div class="table-responsive">
<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
  Add Product
</button>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="addproduct.php" method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Product Name:</label>
            <input type="text" class="form-control" name="name" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Product Description:</label>
            <textarea class="form-control" name="description" required></textarea>
          </div>

          <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" class="form-control" name="price" step="0.01" required>
          </div>

          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" class="form-control" name="quantity" required>
          </div>

          <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select class="form-select" name="category" required>
            <option value="stetionary">Stetionary</option>
            <option value="electronic">Electronic</option>
            <option value="clothing">Clothing</option>
            <option value="furniture">Furniture</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select class="form-select" name="status" required>
              <option value="">-- Select Status --</option>
              <option value="in stock">Active</option>
              <option value="out of stock">In active</option>
            </select>
          </div>
          <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Add</button>
        <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

    <table class="table table-bordered table-hover">
    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><?php echo $name ?></td>
                        <td><?php echo $description ?></td>
                        <td><?php echo $price ?></td>
                        <td><?php echo $quantity ?></td>
                        <td><?php echo $category ?></td>
                        <td><?php echo $status ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Product 2</td>
                        <td>Description of product 2</td>
                        <td>$29.99</td>
                        <td>5</td>
                        <td>2</td>
                        <td>In active</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Product 3</td>
                        <td>Description of product 3</td>
                        <td>$39.99</td>
                        <td>3</td>
                        <td>3</td>
                        <td>active</td>
                    </tr>
                  
                </tbody>
</table>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>