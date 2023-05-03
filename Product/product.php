<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: ../Login/login.php");
}

$result = $_SESSION["user_name"];

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";
$sql = "SELECT * FROM products";
$result1 = mysqli_query($mysqli, $sql);
//$row = $result1->fetch_assoc();

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
  <script type="text/javascript">
    function loadDoc(id) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this)
        }
      };
      xhttp.open("GET", "getProduct.php?id=" + id, true);
      xhttp.send();
      xhttp.onload = function() {
        if (xhttp.status != 200) { // analyze HTTP status of the response
          alert(`Error ${xhttp.status}: ${xhttp.statusText}`); // e.g. 404: Not Found
        } else { // show the result
          console.log(xhttp.response)
          new bootstrap.Modal(document.querySelector("#editProductModal")).show();

        }
      };
    }



    /*window.onload = function () {
        OpenBootstrapPopup();
    };
    function OpenBootstrapPopup() {
        $("#editProductModal").modal('show');
    }*/
    $(document).ready(function() {
      $('#editProductModal').modal('show');
    });
  </script>
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
          <li class="nav-item btnnn">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item btnnn">
            <a class="nav-link active" href="../Product/product.php">Product</a>
          </li>
          <li class="nav-item btnnn">
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
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description:</label>
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
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
            ?>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['category']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td>
                <button type="button" class="btn btn-primary btns" onClick="loadDoc(<?php echo $row['id']; ?>);" data-toggle="modal" data-target="#editProductModal">
                  Edit
                </button>
                <!-- <a class="btn btn-primary" href="./getProduct.php?id=<?php echo $row['id']; ?>" role="button" >Edit</a> -->

              </td>

              <td><button type="button" class="btn btn-danger btns" data-bs-toggle="modal" data-bs-target="#deleteProductModal">
                  Delete
                </button></td>
          </tr>

        <?php
            }
        ?>

        </tbody>
      </table>
      <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editProductModal">Edit Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description:</label>
                  <textarea class="form-control" name="description" value="<?php echo $description; ?>" required></textarea>
                </div>

                <div class="mb-3">
                  <label for="price" class="form-label">Price:</label>
                  <input type="number" class="form-control" name="price" step="0.01" value="<?php echo $price; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="quantity" class="form-label">Quantity:</label>
                  <input type="number" class="form-control" name="quantity" value="<?php echo $quantity; ?>" required>
                </div>

                <div class="mb-3">
                  <label for="category" class="form-label">Category:</label>
                  <select class="form-select" name="category" value="<?php echo $category; ?>" required>
                    <option value="stetionary">Stetionary</option>
                    <option value="electronic">Electronic</option>
                    <option value="clothing">Clothing</option>
                    <option value="furniture">Furniture</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">Status:</label>
                  <select class="form-select" name="status" value="<?php echo $status; ?>" required>
                    <option value="">-- Select Status --</option>
                    <option value="in stock">Active</option>
                    <option value="out of stock">In active</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                  <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>


      <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteProductModal">Delete Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="deleteproduct.php" method="POST">
                <div class="mb-3">
                  <label for="name" class="form-label">Name:</label>
                  <input type="text" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description:</label>
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
                  <button type="submit" class="btn btn-primary">Delete</button>
                  <button type="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>



    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>