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
                <?php 

                $order_result = mysqli_query($con,"SELECT * FROM orders");

                ?>
                <br>
                <h2 align="center">Order History</h2>
                <br>
                <table width="92%" border="1" align="center">
                <tr bgcolor="000000" style="color: #fff;">
                    <td>Order ID</td>    
                    <td>Book Image</td>
                    <td>Book</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td>Date</td>
                </tr>


                <?php
                while($order_row = mysqli_fetch_array($order_result))
                {
                    echo "<tr bgcolor=\"#FFFFFF\">";

                    echo "<td>";
                    echo $order_row['order_id'];
                    echo "</td>";
                    
                    $book_id = $order_row['book_id'];
                    $book_result = mysqli_query($con,"SELECT * FROM books WHERE book_id = '$book_id'");  

                        while($book_row = mysqli_fetch_array($book_result)){
                            echo "<td>";
                            echo "<img src='uploads/".$book_row['book_pic']."' width='200' height='250'/>";
                            echo "</td>";

                            echo "<td>";
                            echo $book_row['book_name'];
                            echo "</td>";
                        }

                    echo "<td>";
                    echo $order_row['quantity'];
                    echo "</td>";

                    echo "<td>";
                    echo "RM".$order_row['total'];
                    echo "</td>";

                    echo "<td>";
                    echo $order_row['date'];
                    echo "</td>";
                }
                mysqli_close($con);
                ?>
                </table>
            </div>
            <br><br>
            <h6>Please email to thebookstore@apu.my if you did not make any of these orders</h6>
        </section>
    </body>
</html>
