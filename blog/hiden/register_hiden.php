<?php
    session_start();
    require_once("../includes/config.php"); 
       
    // check to see if there is a user already logged in, if so redirect them 
    
    if (isset($_SESSION['username']) && isset($_SESSION['password'])){
        //header("Location: ../index.php");  // redirect the user to the home page
        $error_msg = 'You are already logged in'; 
        $_SESSION['error_msg'] = $error_msg;                
        header("Location: ../reglog/register.php");
    }
    else{
        if (isset($_POST)){ 
            // get all of the form data 
            $username = $_POST['username']; 
            $email = $_POST['email']; 
            $password = $_POST['password']; 
            $password2 = $_POST['password2']; 
        }
         // verify all the required form data was entered
         if ($username != "" && $password != "" && $password2 != "" && $email != ''){
            // make sure the two passwords match
            if ($password === $password2){
                // make sure the password meets the min strength requirements
                if ( strlen($password) >= 5 && strpbrk($password, "!#$.,:;()-_@%^*") != false ){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password; 
                    $_SESSION['email'] = $email;              
                    header("Location: ../reglog/add_user.php");
                }
                else{
                    $error_msg = 'Your password is not strong enough. Please use another.'; 
                    $_SESSION['error_msg'] = $error_msg;                
                    header("Location: ../reglog/register.php");
                    
                    //header("Location: ../reglog/register.php?error_msg=<?php echo $error_msg; ");
                }
                    
            }
            else{
                $error_msg = 'Your passwords did not match.';
                $_SESSION['error_msg'] = $error_msg;                
                header("Location: ../reglog/register.php");
            }
        }
            else{
                $error_msg = 'Please fill out all required fields.';
                $_SESSION['error_msg'] = $error_msg;                
                header("Location: ../reglog/register.php");
            }
    }
?>