<?php 
session_start();
if(!isset($_SESSION["user_id"]) ){
  header("Location: ../Login/login.php");
}

$result = $_SESSION["user_name"];
?>


<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="product.css">
    <title>Hello, world!</title>
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

<!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
          <div class="mb-3">
            <label for="name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="description" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="description">
          </div>
          <div class="mb-3">
            <label for="price" class="col-form-label">Price:</label>
            <input type="number" class="form-control" id="price">
          </div>
          <div class="mb-3">
            <label for="quantity" class="col-form-label">Quantity:</label>
            <input type="number" class="form-control" id="quantity">
          </div>
          <div class="mb-3">
    <label for="color-select" class="form-label">Category:</label>
    <select id="color-select" name="color" class="form-select">
      <option value="stetionary">Stetionary</option>
      <option value="electronic">Electronic</option>
      <option value="clothing">Clothing</option>
      <option value="furniture">Furniture</option>
    </select>
    </div>
    <div class="mb-3">
    <label for="status-select" class="form-label">Status:</label>
    <select id="status-select" name="status" class="form-select">
      <option value="active">Active</option>
      <option value="inactive">In active</option>
    </select>
    </div>
        </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <table class="table table-bordered table-hover">
    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Product 1</td>
                        <td>Description of product 1</td>
                        <td>$19.99</td>
                        <td>10</td>
                        <td>1</td>
                        <td>active</td>
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
                    <tr>
                        <td>4</td>
                        <td>Product 4</td>
                        <td>Description of product 4</td>
                        <td>$39.99</td>
                        <td>3</td>
                        <td>4</td>
                        <td>In active</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Product 5</td>
                        <td>Description of product 5</td>
                        <td>$39.99</td>
                        <td>3</td>
                        <td>5</td>
                        <td>active</td>
                    </tr>
                </tbody>
</table>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>