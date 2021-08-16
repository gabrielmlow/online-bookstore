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
                <h3>ACCOUNT SETTINGS</h3>
                <div class="form">
                    <form action="customer-update.php" method="post">
                        <div class="row">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>