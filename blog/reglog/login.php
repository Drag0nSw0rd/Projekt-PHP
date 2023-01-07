<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form action="../hiden/login_hiden.php" method="post">
            <div style="text-align: center;">
                <header><a href="../index.php">Home</a></header>
            </div>
        <h1>Login</h1>
        <?php
            
            // check to see if the user successfully created an account
          
            $error_msg = $_SESSION['error_msg'];
            if (isset($_SESSION['success']) && $_SESSION['success'] = true){
            echo '<font color="green">You have logged in. Please go to the <a href="../index.php">home page</a>.<font>';
            }
            // check to see if the error message is set, if so display it
            else if (isset($error_msg))
            echo '<font color="red">'.$error_msg.'</font>'; 
        ?>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <section>
            <button type="submit" name="loginPost">Login</button>
           
            <a href="./register.php">Register</a>
        </section>
    </form>
</main>
</body>
</html>