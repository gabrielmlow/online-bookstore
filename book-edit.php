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
                <a href="book-view.php">View</a>
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

    // Gets the id of the book from book-view.php //
    $id = ($_GET['bookID']);

    $result = mysqli_query($con,"SELECT * FROM books WHERE bookID=$id");
    
    while($row = mysqli_fetch_array($result)){

    ?>

    <!-- Form -->
    <section class="static about-sec">
        <div class="container">
            <h1>Edit Book</h1>
            <div class="form">
                <form action="book-update.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Book ID (Hidden) -->
                        <input type="hidden" name="book_id" value="<?php echo $row['bookID'] ?>">

                        <!-- Book Name -->
						<div class="col-md-8">
                            <input placeholder="Book Name" name = "book_name" value="<?php echo $row['bookName']?>" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Author -->
						<div class="col-md-8">
                            <input placeholder="Author" name = "author" value="<?php echo $row['bookAuthor']?>" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Publisher -->
						<div class="col-md-8">
                            <input placeholder="Publisher" name="publisher" value="<?php echo $row['bookPublisher']?>" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Genre -->
						<div class="col-md-8">
                            <input placeholder="Genre" name = "genre" value="<?php echo $row['bookGenre']?>" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Price -->
                        <div class="col-md-8">
                            <input type="number" step="any" placeholder="Price" name="price" value="<?php echo $row['bookPrice']?>" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Stock -->
                        <div class="col-md-8">
                            <input type="number" placeholder="Stock" name="stock" value="<?php echo $row['bookStock']?>" required>
                            <span class="required-star">*</span>
                        </div>

                        <!-- Image Preview Function -->
                        <script type='text/javascript'>
                            function preview_image(event){
                                var reader = new FileReader();
                                reader.onload = function(){
                                    var output = document.getElementById('output_image');
                                    output.src = reader.result;
                                }
                                reader.readAsDataURL(event.target.files[0]);
                            }
                        </script>

                        <!-- Upload and Preview Image -->
                        <div id="wrapper" class="col-md-8">
                            <h5 class="col-md-8">Book Cover Image</h5>
                            <img src="uploads/<?php echo $row['bookPic']; ?>"id="output_image" height="300" width="250" />
                            <input type="file" accept="image/*" onchange="preview_image(event)" name="book_image">
                        </div>

                        <!-- Save & Cancel -->
                        <div class="col-lg-8 col-md-12">
                            <button type="submit" class="btn black" name="submit" >Save</button>
                            <script type = "text/javascript">
                                function Warn() {
                                    var retVal = confirm("Are you sure you want to cancel ?");
                                    if( retVal == true ) {
                                        document.write ("User wants to continue!");
                                        return true;
                                    }
                                    else {
                                        document.write ("User does not want to continue!");
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
    
    <?php
    }
    mysqli_close($con);
    ?>

</body>