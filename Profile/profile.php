<?php
session_start();


/* $sql = "UPDATE user SET email=' '%s' WHERE id=1";
if(mysqli_query($mysqli, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
} */
 
try {
            
    $password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

   $mysqli = require dirname(__FILE__, 2) . "/common/data.php";

    $sql = "UPDATE INTO user (name, email, password_hash)
             VALUES(?,?,?)";
    
    $stmt = $mysqli->stmt_init();

    if (! $stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss",
                      $_POST["Username"],
                      $_POST["Email"],
                      $password_hash);
    
    $stmt->execute();

    echo "Signup Successfully";



} catch (mysqli_sql_exception $e) {
    echo "MySQLi Error Code: " . $e->getCode() . "<br />";
    echo "Exception Msg: " . $e->getMessage();


    exit; 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="cotainer">
        <div class="form-box">
            <form action="" name="Formfill" method="POST" onsubmit="return validation()">
                <h1 class="heading">Profile</h1>
                <p id="result"></p>
                <div class="input-box">

                    <input type="text" name="Username" placeholder="Username" value="<?php echo $query2['Name']; ?>">
                </div>
                <div class="input-box">

                    <input type="email" name="Email" placeholder="Email" value="<?php echo $query2['Email']; ?>">

                </div>
                <div class="input-box">

                    <input type="password" name="Password" placeholder="Password" value="<?php echo $query2['Password']; ?>">

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
    <script src="signup.js"></script>
</body>

</html>