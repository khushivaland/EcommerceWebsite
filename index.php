<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
        
        try {
            
            $mysqli = new mysqli("localhost", "root", "", "SIGNUP");
           
            
            $statement = $mysqli->prepare("insert into user  (name, email, password,cpassword) values (?, ?, ?, ?)");
            $statement->bind_param("ssss", $name, $email, $password, $cpassword); 
           

            if($_POST['signup']) {
                $name = $_POST["Username"];
                $email = $_POST["Email"];
                $password = $_POST["Password"];
                $cpassword = $_POST["CPassword"];
            
            } 
            
            $statement->execute(); 

        } catch (mysqli_sql_exception $e) {
            echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            echo "Exception Msg: " . $e->getMessage();
            exit; 
        }

        $mysqli->close();


?>
