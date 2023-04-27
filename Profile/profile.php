<?php
session_start();

if(!isset($_SESSION["user_id"]) ){
    header("Location: ../Login/login.php");
}

$mysqli = require dirname(__FILE__, 2) . "/common/data.php";


if(isset($_SESSION['VALID_USER'])){

  if(isset($_POST['submit']))
  {
      $username = $_POST['Name'];
      $password = $_POST['Password'];
  
      $s=$mysqli->query("UPDATE user SET name='$username', password='$password' WHERE name='".$mysqli->real_escape_string($_SESSION["VALID_USER"])."'");
  
      if ($s)
          { echo "<script type='text/javascript'>alert('Successful - Record Updated!'); window.location.href = 'user_profile.php';</script>"; }
      else
          { echo "<script type='text/javascript'>alert('Unsuccessful - ERROR!'); window.location.href = 'user_profile.php';</script>"; }
  }
}
  $query1=$mysqli->query("SELECT * FROM user WHERE name='".$mysqli->real_escape_string($_SESSION["VALID_USER"])."'  AND user_levels = '".$mysqli->real_escape_string('1')."'");
  $query2= $result->fetch_assoc($query1); 
          
       ?>
?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
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

                    <input type="text" name="Username" placeholder="Username" >
                </div>
                <div class="input-box">

                    <input type="email" name="Email" placeholder="Email" >

                </div>
                <div class="input-box">

                    <input type="password" name="Password" placeholder="Password">

                </div>
                <div class="input-box">

                    <input type="password" name="CPassword" placeholder="Confirm Password">
                </div>
                <div class="button">
                    <input type="submit" name="submit" class="btn" value="Update">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>