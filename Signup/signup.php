


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
   <div class="cotainer">
    <div class="form-box">
        <form action="../common/index.php" name="Formfill" method="POST" onsubmit="return validation()">
            <h1 class="heading">Sign-Up</h1>
            <p id="result"></p>
            <div class="input-box">
                
                <input type="text" name="Username" placeholder="Username" >
            </div>
            <div class="input-box">
                
                <input type="email" name="Email" placeholder="Email">

            </div>
            <div class="input-box">
               
                <input type="password" name="Password" placeholder="Password">
                
            </div>
            <div class="input-box">
               
                <input type="password" name="CPassword" placeholder="Confirm Password">
            </div>
            <div class="button">
                <input type="submit" name="signup"  class="btn" value="Sign-Up">
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
    <script src="signup.js"></script>
</body>
</html>