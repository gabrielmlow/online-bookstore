<!DOCTYPE html>
<html lang="en">

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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>
    <section class="static about-sec">
        <div class="container">
            <h1>My Account / Register</h1>
            <div class="form">
                <form action="customer-insert.php" method="post">
                    <div class="row">
                        <!-- First Name -->
                        <?php
                            if (isset($_GET['first_name'])){
                                $first_name = $_GET['first_name'];

                                echo 
                                '<div class="col-md-4">
                                    <input placeholder="First Name" name="first_name" value="'.$first_name.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-4">
                                    <input placeholder="First Name" name="first_name" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>

                        <!-- Last Name -->
                        <?php
                            if (isset($_GET['last_name'])){
                                $last_name = $_GET['last_name'];

                                echo 
                                '<div class="col-md-4">
                                    <input placeholder="Last Name" name = "last_name" value="'.$last_name.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-4">
                                    <input placeholder="Last Name" name = "last_name"  required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>

                        <!-- DOB -->
                        <?php
                            if (isset($_GET['dob'])){
                                $dob = $_GET['dob'];

                                echo 
                                '<div class="col-md-8">
                                    <input type="date" placeholder="Birthday" name = "dob" value="'.$dob.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-8">
                                    <input type="date" placeholder="Birthday" name = "dob" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>
                        
                        <!-- Address -->
                        <?php
                            if (isset($_GET['address'])){
                                $address = $_GET['address'];

                                echo 
                                '<div class="col-md-8">
                                    <input placeholder="Address" name = "address" value="'.$address.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-8">
                                    <input placeholder="Address" name = "address" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>

                        <!-- City -->
                        <?php
                            if (isset($_GET['city'])){
                                $city = $_GET['city'];

                                echo 
                                '<div class="col-md-8">
                                    <input placeholder="City" name = "city" value="'.$city.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-8">
                                    <input placeholder="City" name = "city" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>

                        <!-- Postal Code -->
                        <?php
                            if (isset($_GET['postal_code'])){
                                $postal_code = $_GET['zipcode'];

                                echo 
                                '<div class="col-md-8">
                                    <input placeholder="Postal Code" name="postal_code" value="'.$postal_code.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-8">
                                    <input placeholder="Postal Code" name="postal_code" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>

                        <!-- State -->
                        <?php
                            if (isset($_GET['state'])){
                                $state = $_GET['state'];

                                echo 
                                '<div class="col-md-8">
                                    <input placeholder="State" name="state" value="'.$state.'" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                            else{
                                echo
                                '<div class="col-md-8">
                                    <input placeholder="State" name="state" required>
                                    <span class="required-star">*</span>
                                </div>';
                            }
                        ?>

                        <!-- Email Registered Error -->
                        <?php
                            if (isset($_GET['error'])){
                                if ($_GET['error'] == "registered"){
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
                                    <input type="email" placeholder="Email" maxlength="254" name = "email" value="'.$email.'" required>
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

                        <!-- Password -->
                        <div class="col-md-8">
                            <input type="password" placeholder="Password" maxlength="20" name="password" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Password Unmatched Error -->
                        <?php
                            if (isset($_GET['error'])){
                                if ($_GET['error'] == "passwordcheck"){
                                    echo 
                                    '<div class="col-sm-8">
                                        <small id="passwordHelp" class="text-danger">
                                            The password does not match.
                                        </small>      
                                    </div>';
                                }
                            }
                        ?>

                        <!-- Confirm Password -->
						<div class="col-md-8">
                            <input type="password" placeholder="Confirm Password" maxlength="20" name="cpassword" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-lg-8 col-md-12">
                            <button type="submit" class="btn black" name="submit">Register</button>
                            <h5>Registered? <a href="login.php">Login here</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>