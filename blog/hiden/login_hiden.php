<?php
    session_start();
    // include our connect script
    require_once("../includes/config.php");
    
    // check to see if there is a user already logged in, if so redirect them
    
    // check to see if the user clicked the login button
    if (isset($_POST['loginPost'])){
        // get the form data for processing
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (isset($_SESSION['username']) && isset($_SESSION['password'])){
            $error_msg = 'You are already logged in. Now you can enjoy our blog';
            $_SESSION['error_msg'] = $error_msg;
            header("Location: ../reglog/login.php"); // redirect the user to the home page
        }
        else{
            if ($username != "" && $password != ""){ 
            
                // query the database to see if the username exists
                $query = mysqli_query($connection, "SELECT * FROM users WHERE username='{$username}'");
                if (mysqli_num_rows($query) == 1){
                    // get the record from the query
                    $record = mysqli_fetch_assoc($query);
                    
                    // encrypt the user's password
                    $password = md5($password);
                    // compare the passwords to make sure they match
                    if ($password === $record['password'] ){  
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $password;
                        
                        header("Location: ../index.php");                   
                    }
                    else{
                        // make sure the user has activated their account
                        $error_msg = 'Your password was incorrect.'; 
                        $_SESSION['error_msg'] = $error_msg;                
                        header("Location: ../reglog/login.php");
                    }
                }
                else{
                    $error_msg = 'That account does not exist.';
                    $_SESSION['error_msg'] = $error_msg;                
                    header("Location: ../reglog/login.php");
                }
            }
            else{
                $error_msg = 'Please fill out all required fields.';
                $_SESSION['error_msg'] = $error_msg;                
                header("Location: ../reglog/login.php");
            }
        }
    }            
?>