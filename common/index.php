<?php
       
        
        try {
            
            $password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

           $mysqli = require dirname(__FILE__, 2) . "/common/data.php";
            

            $sql = "INSERT INTO user (name, email, password_hash)
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





















