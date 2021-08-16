<?php

session_start();
include("conn.php");

?>

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
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-item active">
                                <a href="customer-index.php" class="nav-link">Home</a>
                            </li>
                            <li class="navbar-item">
                                <a href="customer-shop.php" class="nav-link">Shop</a>
                            </li>
                            <li class="navbar-item">
                                <a href="customer-about.php" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
                                <a href="customer-faq.php" class="nav-link">FAQ</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0" method="post" action="customer-search.php">
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search here..." aria-label="Search">
                        </form>
                        <?php
                            if (isset($_SESSION['mySession'])){   
                                echo
                                '<div class="member-options">
                                <button class="drop-button">Hello, '.$_SESSION["first_name"].'</button>
                                    <div class="dropdown-content">
                                        <a href="customer-settings.php">Settings</a>
                                        <a href="customer-view-purchases.php">Purchases</a>
                                        <a href="logout.php">Sign Out</a>
                                    </div>
                                </div>';

                                if (isset($_SESSION["shopping_cart"])){
                                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                                    echo 
                                    '<div class="cart my-2 my-lg-0">
                                        <span>
                                            <i class="fa fa-shopping-cart" aria-hidden="true" href="customer-cart.php"></i></span>
                                        <span class="quntity">'.$cart_count.'</span>
                                    </div>';
                                }
                            }

                            else{
                                echo 
                                '<div class="login-signup">
                                    <a href="login.php">Login/Signup</a>
                                </div>';
                            }
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header> 
    <section class="static about-sec">
        <div class="container">
            <h2>Shop</h2>
            <div class="recent-book-sec">
                <div class="row">
                    <!-- Displaying the new books -->
                    <?php 

                    $result = mysqli_query($con,"SELECT * FROM books");

                    while($row = mysqli_fetch_array($result)){

                    echo 
                    '<div class="col-md-3">
                        <div class="item">
                            <form method="post" action="customer-cart-insert.php">
                                <input type="hidden" name="book_id" value='.$row["book_id"].' />
                                <div class="shop-image"><img src="uploads/'.$row['book_pic'].'" width="200" height="250"/> </div>
                                <div class="shop-name">'.$row['book_name'].' </div>
                                <div class="price">$'.$row['book_price'].'</div>
                                <button type="submit" class="shop-buy">Buy Now</button>
                            </form>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="address">
                        <h4>Our Address</h4>
                        <h6>The BookStore Theme, 4th Store
                        Beside that building, USA</h6>
                        <h6>Call : 800 1234 5678</h6>
                        <h6>Email : info@bookstore.com</h6>
                    </div>
                    <div class="timing">
                        <h4>Timing</h4>
                        <h6>Mon - Fri: 7am - 10pm</h6>
                        <h6>​​Saturday: 8am - 10pm</h6>
                        <h6>​Sunday: 8am - 11pm</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="navigation">
                        <h4>Navigation</h4>
                        <ul>
                            <li><a href="customer-index.php">Home</a></li>
                            <li><a href="customer-about.php">About Us</a></li>
                            <li><a href="privacy-policy.php">Privacy Policy</a></li>
                            <li><a href="terms-conditions.php">Terms</a></li>
                            <li><a href="customer-shop.php">Products</a></li>
                        </ul>
                    </div>
                    <div class="navigation">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="">Shipping & Returns</a></li>
                            <li><a href="privacy-policy.php">Privacy</a></li>
                            <li><a href="customer-faq.php">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form">
                        <h3>Quick Contact us</h3>
                        <h6>We are now offering some good discount 
                            on selected books go and shop them</h6>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input placeholder="Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Messege"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn black">Alright, Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>(C) 2017. All Rights Reserved. BookStore Wordpress Theme</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="share align-middle">
                            <span class="fb"><i class="fa fa-facebook-official"></i></span>
                            <span class="instagram"><i class="fa fa-instagram"></i></span>
                            <span class="twitter"><i class="fa fa-twitter"></i></span>
                            <span class="pinterest"><i class="fa fa-pinterest"></i></span>
                            <span class="google"><i class="fa fa-google-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>