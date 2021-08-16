<?php

session_start();
if (isset($_POST['action']) && $_POST['action']=="remove"){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
			if($_POST["code"] == $key){
			unset($_SESSION["shopping_cart"][$key]);
			}
			if(empty($_SESSION["shopping_cart"]))
			unset($_SESSION["shopping_cart"]);
		}		
	}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];

        // Stop the loop after product is found
        break; 
    }
} 	
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
    <section class="static about-sec">
        <div class="container">
            <h1>Cart</h1>
            <div class="cart-page">
                <?php
                if(isset($_SESSION["shopping_cart"])){
                    $total_price = 0;
                ?> 
                <table class="cart-page-table">
                    <tbody>
                        <tr>
                            <td></td>
                            <td>ITEM NAME</td>
                            <td>QUANTITY</td>
                            <td>UNIT PRICE</td>
                            <td>TOTAL</td>
                        </tr>

                        <?php 
                        $purchased = array();

                        foreach ($_SESSION["shopping_cart"] as $product){
                        ?>
                        
                        <tr>
                            <td>
                                <img src='uploads/<?php echo $product['image'] ?>' width="100" height="150" />
                                </td>
                                <td><?php echo $product["name"]; ?><br />
                                <form method='post' action=''>
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                    <input type='hidden' name='action' value="remove" />
                                    <button type='submit' class='remove'>Remove Item</button>
                                </form>
                            </td>
                            <td>
                                <form method='post' action=''>
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                    <input type='hidden' name='action' value="change" />
                                    <select name='quantity' class='quantity' onChange="this.form.submit()">
                                        <option <?php if($product["quantity"]==1) echo "selected";?>
                                            value="1">1</option>
                                        <option <?php if($product["quantity"]==2) echo "selected";?>
                                            value="2">2</option>
                                        <option <?php if($product["quantity"]==3) echo "selected";?>
                                            value="3">3</option>
                                        <option <?php if($product["quantity"]==4) echo "selected";?>
                                            value="4">4</option>
                                        <option <?php if($product["quantity"]==5) echo "selected";?>
                                            value="5">5</option>
                                    </select>
                                </form>
                            </td>
                            <td><?php echo "$".$product["price"]; ?></td>
                            <td><?php $p2p = $product["price"]*$product["quantity"]; echo "$".$p2p; ?></td>
                        </tr>

                        <?php
                        $total_price += ($product["price"]*$product["quantity"]);
                        } 
                        ?>

                        <tr>
                            <td colspan="5" align="right">
                                <strong>TOTAL: <?php echo "$".$total_price; ?></strong>
                            </td>
                        </tr>
                    </tbody>
                </table> 

                <!-- Continue Browsing Button  -->
                <button class="cart-button" onclick="location.href='customer-shop.php';" style="vertical-align:middle"><span>Continue Browsing </span></button>
                
                <!-- Checkout button -->
                <form action="customer-checkout.php" method="post">
                    <button class="cart-button2" style="vertical-align:middle"><span>Checkout </span></button>
                </form>
                
                <?php
                }
                
                // If cart is empty // 
                else{
                echo "<h3>Your cart is empty!</h3>";
                }
                ?>
            </div>
        </div>
    </section>
</body>