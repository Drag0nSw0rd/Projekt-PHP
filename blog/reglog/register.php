
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
<hr />
</head>
<body>
<main>
    <form action="../hiden/register_hiden.php" method="post">
            <div style="text-align: center;">
                <header><a href="../index.php">Home</a></header>
            </div>
            <h1>Sign Up</h1>
            <div class="" style="text-align: center;" >
                <?php
                //echo $_GET['error_msg'];
                session_start();
                $error_msg = $_SESSION['error_msg'];
                //echo $error_msg;
                $success = $_SESSION['success'];
                // check to see if the user successfully created an account
                //echo '<font color="green">Yay!! Your account has been created. <a href="./login.php">Click here</a> to login!</font>';
                if (isset($success) && $success == true){
                    //header('Location: ./register.php');
                    echo '<font color="green">Yay!! Your account has been created. <a href="./login.php">Click here</a> to login!</font>';
                }
                // check to see if the error message is set, if so display it
                else if (isset($error_msg)){
                    echo '<font color="red">'.$error_msg.'</font>';
                } ?>
            
            
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password(More then 5 characters long, with one special character):</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password2">Password Again:</label>
                <input type="password" name="password2" id="password2">
            </div>
            <div>
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                    with the
                    <a href="#" title="term of services">term of services</a>
                </label>
            </div>
            <button type="submit">Register</button>
            <?php //session_destroy(); ?>
            <footer>Already a member? <a href="./login.php">Login here</a></footer>
            <footer>Log out from the system <a href="./log_out.php">Logout here</a></footer>
    </form>
</main>
</body>
</html>