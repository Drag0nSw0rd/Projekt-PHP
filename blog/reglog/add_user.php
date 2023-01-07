<?php
session_start();
require_once "../includes/config.php";
    $check="SELECT * FROM users WHERE username = '$_SESSION[username]'";
    $rs = mysqli_query($connection,$check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if($data[0] > 1) {
        $error_msg = "User already exists. Please choose another one";
        $_SESSION['error_msg'] = $error_msg;
        header("Location: ./register.php");
    }
    else
    {
        $password = md5($_SESSION['password']);
        
        $username = $_SESSION['username'];
        $email = $_SESSION['email']; 
        
        mysqli_query($connection, "INSERT INTO users (username, email, password) VALUES (
            '{$username}', '{$email}', '{$password}'
            )");
        $query = mysqli_query($connection, "SELECT * FROM users WHERE username='{$username}'");
        if (mysqli_num_rows($query) == 1){
        
        
            $_SESSION['success'] = true;        
            echo 'Success';       
            header("Location: ./register.php");
            
        }
        else{
            $error_msg = 'An error occurred and your account was not created.';
            echo $error_msg;
            $_SESSION['error_msg'] = $error_msg;
            header("Location: ./register.php");
    
        }        
    } 
    
?>