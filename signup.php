<?php include("index.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="cotainer">
    <div class="form-box">
        <form action="" name="Formfill" method="post" onsubmit="return validation()">
            <h1 class="heading">Sign-Up</h1>
            <p id="result"></p>
            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="text" name="Username" placeholder="Username" >
            </div>
            <div class="input-box">
                <i class='bx bxs-envelope'></i>
                <input type="email" name="Email" placeholder="Email">
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="Password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="CPassword" placeholder="Confirm Password">
            </div>
            <div class="button">
                <input type="submit" name="signup" onclick="validation()" class="btn" value="Sign-Up">
                <input type="reset" class="btn" value="Reset">
                
            </div>
            <div class="group">
                <span><a href="#">Forget-Password</a></span>
            </div>
        </form>
    </div>
    <div class="popup" id="popup">
        <ion-icon name="checkmark-circle-outline"></ion-icon>
        <h2>Thank you!</h2>
        <p>Your were Registration Successfully. Thanks!</p>
        <a href="#"><button onclick="CloseSlide()">Ok</button></a>
    </div>
   </div>
    <script src="script.js"></script>
</body>
</html>
<?php
if($_POST['signup']) {
    $uname = $_POST["Username"];
    $email = $_POST["Email"];
    $pwd = $_POST["Password"];
    $cpwd = $_POST["CPassword"];

    $query = "INSERT INTO SIGNUP_DB VALUES('$uname','$email',' $pwd','$cpwd')";

    $data = mysqli_query($conn,$query);

    if($data){
        echo "Data Inserted into Database";
    }
    else
    {
        echo "Failed";
    }
}
?>