<?php
session_start();


if (!$_SESSION["user_id"]) {
    header("Location: ../Login/login.php");
}


$mysqli = require dirname(__FILE__, 2) . "/common/data.php";
$sql = "SELECT * FROM user ";
$query = mysqli_query($mysqli, $sql);
$result = mysqli_fetch_assoc($query);

//print_r($result)
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../Common/style.css"> -->
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
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
          <i class='bx bxs-user-circle'>
                        <span>
                            <?php
                            echo $result['name'];
                            ?>
                        </span>
                    </i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../Logout/logout.php">Log out</a></li>
          </ul>
        </li>
                </ul>
                </form>
            </div>
        </div>
    </nav>

    <div class="img w-100 vh-100 d-flex justify-content-center align-items-center">
        <h1>Welcome!!</h1>
        <?php if (isset($_SESSION["user_id"])) : ?>
            <p>You are logged in.</p>
        <?php else : ?>
            <p><a href="../Login/login.php">Log in</a> or <a href="../Signup/signup.html">sign up</a></p>
        <?php endif; ?>

        <div class="content text-center">
            <h1>hello everyone</h1>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>