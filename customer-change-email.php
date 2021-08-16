<?php

include('conn.php');
session_start();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Store</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#03a6f3">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <header>
            <div class="main-menu">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                    </nav>
                </div>
            </div>
        </header>
        <section class="static about-sec">
            <div class="container">
                <h3>Change Email</h3>
                <div class="form">
                    <form action="customer-update-email.php" method="post">
                        <div class="row">
                            <!-- Email Registered Error -->
                            <?php
                                if (isset($_GET['error'])){
                                    if ($_GET['error'] == "emailused"){
                                        echo 
                                        '<div class="col-sm-8">
                                            <small id="passwordHelp" class="text-danger">
                                                This email is already registered.
                                            </small>      
                                        </div>';
                                    }
                                }
                            ?>
                            
                            <!-- Email -->
                            <?php
                                if (isset($_GET['email'])){
                                    $email = $_GET['email'];

                                    echo 
                                    '<div class="col-md-8">
                                        <input type="email" placeholder="New Email" maxlength="254" name="email" value="'.$email.'" required>
                                        <span class="required-star">*</span>
                                    </div>';
                                }
                                else{
                                    echo
                                    '<div class="col-md-8">
                                        <input type="email" placeholder="Email" maxlength="254" name="email" required>
                                        <span class="required-star">*</span>
                                    </div>';
                                }
                            ?>

                            <!-- Incorrect password error message -->
                            <?php
                                if (isset($_GET['error'])){
                                    if ($_GET['error'] == "wrongpassword"){
                                        echo 
                                        '<div class="col-sm-8">
                                            <small id="passwordHelp" class="text-danger">
                                                Password is incorrect.
                                            </small>      
                                        </div>';
                                    }
                                }
                            ?>

                            <!-- Password -->
                            <div class="col-md-8">
                                <input type="password" placeholder="Password" maxlength="20" name="password" required>
                                <span class="required-star">*</span>
                            </div>

                            <br><br>
                            <!-- Save & Cancel -->
                            <div class="col-lg-8 col-md-12">
                                <button type="submit" class="btn black" name="submit" >Save</button>
                                    <script type = "text/javascript">
                                        function Warn() {
                                            var retVal = confirm("Are you sure you want to cancel ?");
                                            if( retVal == true ) {
                                                window.open("customer-index");
                                                return true;
                                            }
                                            else {
                                                
                                                return false;
                                            }
                                        }
                                    </script>
                                <button type="button" class="btn black" onclick="Warn();">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>