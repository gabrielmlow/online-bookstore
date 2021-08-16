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
                        <a class="navbar-brand" href="customer-index.php"><img src="images/logo.png" alt="logo"></a>
                    </nav>
                </div>
            </div>
        </header>
        <section class="static about-sec">
            <div class="container">
                <h3>ACCOUNT SETTINGS</h3>
                <div class="form">
                    <form action="customer-update.php" method="post">
                        <div class="row">
                            <!-- Getting data from database -->
                            <?php
                            // Getting the user's id // 
                            $user_id = $_SESSION['mySession'];

                            $sql = "SELECT * FROM customers WHERE customer_id = '".$user_id."'";
                            $result = mysqli_query($con, $sql);
                            $fetch = mysqli_fetch_array($result);
                            $first_name = $fetch['customer_fname'];
                            $last_name = $fetch['customer_lname'];
                            $dob = $fetch['customer_dob'];
                            $address = $fetch['customer_address'];
                            $city = $fetch['customer_city'];
                            $state = $fetch['customer_state'];
                            $email = $fetch['customer_email'];
                            $zipcode = $fetch['customer_zipcode'];

                            echo
                                '<input type="hidden" name="id" value="'.$user_id.' ?>">'. 
                                '<div class="col-md-4">
                                    <input placeholder="First Name" name="first_name" value="'.$first_name.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-4">
                                    <input placeholder="Last Name" name = "last_name" value="'.$last_name.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-8">
                                    <input type="date" placeholder="Birthday" name = "dob" value="'.$dob.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-8">
                                    <input placeholder="Address" name = "address" value="'.$address.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-8">
                                    <input placeholder="City" name = "city" value="'.$city.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-8">
                                    <input placeholder="Postal Code" name="zipcode" value="'.$zipcode.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-8">
                                    <input placeholder="State" name = "state" value="'.$state.'" required>
                                    <span class="required-star">*</span>
                                </div>'.
                                '<div class="col-md-8">
                                    <h5><a href="customer-change-email.php">Change Email</a></h5>
                                </div>'.
                                '<div class="col-md-8">
                                    <h5><a href="customer-change-password.php">Change Password</a></h5>
                                </div>'.
                                '<div class="col-md-8">
                                    <h5><a href="customer-delete-account.php">Deactivate Account</a></h5>
                                </div>';                                     
                           ?>     
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
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>