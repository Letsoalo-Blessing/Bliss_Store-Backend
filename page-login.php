<?php

session_start();
include("includes/db.php");
include("includes/functions.php");

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator - Login Page</title>
    <meta name="Login Page" content="Administrator - Login Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="page-login.php" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" name="username" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Me
                                    </label>
                                </div>

                                <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <br><br>
                                <div class="register-link m-t-15 text-center">
                                    
                                    <p>Don't have account ? <a href="page-register.php"> Sign Up Here</a></p>
                                </div>
                    </form>
                </div>
                <?php
		
        if(isset($_POST['login'])){
            
            $username=$_POST['username'];
            $password=$_POST['password'];
        
            $sel_c = "select * from tbladmin where username='$username' AND password='$password'";
            $run_c = mysqli_query($conn,$sel_c);
            
            $check_admin = mysqli_num_rows($run_c);
            
            if($check_admin==0){

                $_SESSION['message']="Username and Password combiation is incorrect";
                echo "<script>window.open('page-login.php','_self')</script>";
                

            }
            else{

            $_SESSION['username']=$username;
            
            echo "<script>window.open('index.php','_self')</script>";
            }
            
        }
    ?>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
