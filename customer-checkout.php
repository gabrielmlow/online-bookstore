<?php

session_start();
include("conn.php");

// Gets the user's id from session //
$customer_id = $_SESSION['mySession'];

// Iterates through the shopping cart array//
foreach ($_SESSION['shopping_cart'] as $product){
    $book_id = $product['code'];
    $quantity = $product['quantity'];
    $total = $product["price"]*$product["quantity"];
    $sql = "INSERT INTO orders (`book_id`, `customer_id`, `quantity`, `price`) VALUES ('$book_id', '$customer_id', '$quantity', '$total')";
    mysqli_query($con,$sql);
}

// Clears the cart after purchase // 
unset($_SESSION['shopping_cart']);

// If the query cannot be executed //
if (!mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
}
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
                    <a class="navbar-brand" href="customer-index.php"><img src="images/logo.png" alt="logo"></a>
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
                                <a href="about.php" class="nav-link">About</a>
                            </li>
                            <li class="navbar-item">
                                <a href="faq.php" class="nav-link">FAQ</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search here..." aria-label="Search">
                            <span class="fa fa-search"></span>
                        </form>
                        <?php
                            if (isset($_SESSION['mySession'])){   
                                echo
                                '<div class="member-options">
                                <button class="drop-button">Hello, '.$_SESSION["first_name"].'</button>
                                    <div class="dropdown-content">
                                        <a href="member-settings.php">Settings</a>
                                        <a href="#">Purchases</a>
                                        <a href="logout.php">Sign Out</a>
                                    </div>
                                </div>';

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
    <div class="purchase-success">
        <h6>Your item(s) has been successfully pruchased!</h6>
    </div>
    <div class="purchase-success">
        <button class="cart-button" onclick="location.href='customer-shop.php';" style="vertical-align:middle"><span>Back to shop </span></button>
    </div>
</body>