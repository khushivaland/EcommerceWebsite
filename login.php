<?php 

$is_invalid = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/data.php";
    
    //$password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

    $sql = sprintf("SELECT * FROM user WHERE email = '%s' ",
                    $mysqli-> real_escape_string($_POST["Email"]) );
   
                    
    
    $result = $mysqli -> query($sql);
    $user = $result -> fetch_assoc();

    
    
    if($user){
       /* echo json_encode($user);
        echo "<br />";*/
        //echo $_POST["Password"];
        //echo "<br />";
       // echo json_encode(password_verify($_POST["Password"], $user["password_hash"]));
    //return
        if(password_verify($_POST["Password"], $user["password_hash"])){
            die("Login Successfully");
        }
    }
    $is_invalid = true;
}

?>

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
        <form  name="Formfill" method="POST" onsubmit="return validation()">
            <h1 class="heading">Login</h1>
             <?php if ($is_invalid):?>
                <em>Invalid login</em>
            <?php endif; ?> 
            <p id="result"></p>
            <div class="input-box">
                <i class='bx bxs-envelope'></i>
                <input type="email" name="Email" placeholder="Email" value="<?= htmlspecialchars( $_POST["Email"] ?? "") ?>">
            </div>
            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" name="Password" placeholder="Password">
            </div>
            
            <div class="button">
                <input type="submit" name="signup"  class="btn" value="Login">
                <!-- <input type="reset" class="btn" value="Reset"> -->
                
            </div>
            <div class="group">
                <span><a href="signup.html">Sign-Up</a>
                </span>
            </div>
        </form>
    </div>
   </div>
    <script src="script.js"></script>
</body>
</html>
