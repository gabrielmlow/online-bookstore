<?php

session_start();

if (!isset($_SESSION['mySession'])){ 
    header("Location: login.php");
    session_write_close();
    exit();
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
                    <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>
    <div class="manage-navbar">
        <div class="manage-dropdown">
            <button class="manage-dropbtn">Books 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="manage-dropdown-content">
                <a href="book-add.php">Add</a>
                <a href="book-view.php">View</a>
            </div>
        </div> 
        <div class="manage-dropdown">
            <button class="manage-dropbtn">Customers
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="manage-dropdown-content">
                <a href="#">Manage</a>
            </div>
        </div> 
        <div class="manage-dropdown">
            <button class="manage-dropbtn">Transactions
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="manage-dropdown-content">
                <a href="#">View</a>
            </div>
        </div>
        
        <!-- Gives employee settings access to managers ONLY -->
        <?php
            if (isset($_SESSION['position'])){
                
                if ($_SESSION['position'] == "Manager"){
                    echo
                    '<div class="manage-dropdown">
                        <button class="manage-dropbtn">Employees 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="manage-dropdown-content">
                            <a href="#">Add</a>
                            <a href="#">View</a>
                        </div>
                    </div>';
                }
            }
        ?>
        <div class="manage-logout" style="float:right;">
            <a href="logout.php">Logout</a>
        </div> 
    </div>
</body>