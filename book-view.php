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
                    <a class="navbar-brand"><img src="images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    <!-- Header -->
    <div class="manage-navbar">
        <!-- Books settings -->
        <div class="manage-dropdown">
            <button class="manage-dropbtn">Books 
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="manage-dropdown-content">
                <a href="book-add">Add</a>
                <a href="book-view">View</a>
            </div>
        </div> 

        <!-- Customers settings -->
        <div class="manage-dropdown">
            <button class="manage-dropbtn">Customers
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="manage-dropdown-content">
                <a href="customer-view.php">View</a>
            </div>
        </div> 

        <!-- Transactions settings -->
        <div class="manage-dropdown">
            <button class="manage-dropbtn">Transactions
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="manage-dropdown-content">
                <a href="#">Add</a>
                <a href="#">Edit</a>
            </div>
        </div> 

        <!-- Employee settings (only manager can access) -->
        <?php
            if (isset($_SESSION['mySession'])){
                
                if ($_SESSION['mySession'] == "Manager"){
                    echo
                    '<div class="manage-dropdown">
                        <button class="manage-dropbtn">Employees 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="manage-dropdown-content">
                            <a href="#">Add</a>
                            <a href="#">Edit</a>
                        </div>
                    </div>';
                }
            }
        ?>

        <!-- Logout button -->
        <div class="manage-logout" style="float:right;">
            <a href="logout.php">Logout</a>
        </div> 
    </div>

    <?php 

    include("conn.php");
    $result = mysqli_query($con,"SELECT * FROM books");

    ?>
    <br>
    <h2 align="center">Books</h2>
    <br>
    <table width="92%" border="1" align="center">
    <tr bgcolor="000000" style="color: #fff;">
        <td>Cover Picture</td>
        <td>Title</td>
        <td>Author</td>
        <td>Publisher</td>
        <td>Genre</td>
        <td>Price</td>
        <td>Stock</td>
        <td></td>
        <td></td>
    </tr>


    <?php
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr bgcolor=\"#FFFFFF\">";

    echo "<td>";
    echo "<img src='uploads/".$row['bookPic']."' width='200' height='250'/>";
    echo "</td>";

    echo "<td>";
    echo $row['bookName'];
    echo "</td>";

    echo "<td>";
    echo $row['bookAuthor'];
    echo "</td>";

    echo "<td>";
    echo $row['bookPublisher'];
    echo "</td>";

    echo "<td>";
    echo $row['bookGenre'];
    echo "</td>";

    echo "<td>";
    echo "RM".$row['bookPrice'];
    echo "</td>";

    echo "<td>";
    echo $row['bookStock'];
    echo "</td>";

    echo "<td><a href=\"book-edit.php?bookID=";
    echo $row['bookID'];
    echo "\">Edit</a></td>";

    echo "<td><a href=\"book-delete.php?BookID=";
    echo $row['bookID'];
    echo "\" onClick=\"return confirm('Delete ";
    echo $row['bookName'];
    echo " details?');\">Delete</a></td></tr>";
    }
    mysqli_close($con);
    ?>

    </table>
</body>