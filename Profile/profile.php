<?php 
session_start();
if(!isset($_SESSION["user_id"]) ){
  header("Location: ../Login/login.php");
}

$result = $_SESSION["user_name"];

$_SESSION['profile_updated'] = true;


if(isset($_SESSION['user_id'])) { 
  $user_id = $_SESSION['user_id']; 
  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $name = $_POST['Username'];
      $email = $_POST['Email'];
      $password = $_POST['Password'];
  
      $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);

      
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          
          die('Invalid email format');
      }
      $new_password = password_hash($password, PASSWORD_DEFAULT);
      

      
      
      $mysqli = require dirname(__FILE__, 2) . "/common/data.php";

      
      
      
      $query = "UPDATE user SET name='$name', email='$email' , password_hash='$new_password' WHERE user_id=$user_id";
      $result1 = $mysqli->query($query);
      if($result1) {
          
          header('Location: profile.php');
          exit();
      } else {
          
          die('Error updating user data');
      }
  } else{

if(isset($_SESSION['user_id'])) { 
  $user_id = $_SESSION['user_id']; 
  
  $mysqli = require dirname(__FILE__, 2) . "/common/data.php";

  
  $query = "SELECT * FROM user WHERE user_id = $user_id";
  $result1 = $mysqli->query($query);
  $user = $result1->fetch_assoc(); 
}

}
}

?>
<!Doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
   
   
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

    <div class="cotainer">

        <div class="form-box">
            <form action="" name="Formfill" method="POST" onsubmit="return validation()">
                <h1 class="heading">Profile</h1>
                <p id="result"></p>
                <div class="input-box">

                    <input type="text" name="Username" placeholder="Username" value="<?php echo $user['name']; ?>" >
                </div>
                <div class="input-box">

                    <input type="email" name="Email" placeholder="Email" value="<?php echo $user['email']; ?>" >

                </div>
                <div class="input-box">

                    <input type="password" name="Password" placeholder="Password" value="<?php echo $user['password_hash']; ?>">


                </div>
                <div class="input-box">

                    <input type="password" name="CPassword" placeholder="Confirm Password" value="<?php echo $user['password_hash']; ?>">
                </div>
                <div class="button">
                    <input type="submit" name="submit" id="toastbtn" class="btn" value="Update">
                    <input type="reset" class="btn" value="Reset">

                </div>
                <div class="group">
                    <span>
                        <a href="../Login/login.php">Login</a>
                    </span>
                </div>
            </form>
        
    </div>
    
  </div>
  <div class="toast">
    <div class="toast-header">
      <strong class="me-auto">Toast Header</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body">
      <p>Some text inside the toast body</p>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    
    document.getElementById("toastbtn").onclick = function() {
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
      })
      toastList.forEach(toast => toast.show()) 
    }
       </script>
</body>

</html>