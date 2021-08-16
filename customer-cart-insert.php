<?php

include('conn.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $code = $_POST['book_id'];
    
    $sql = "SELECT * FROM books WHERE book_id = $code";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_assoc($result);

    $name = $row['book_name'];
    $price = $row['book_price'];
    $image = $row['book_pic'];
    
    $cartArray = array(
        $code=>array('name'=>$name, 'code'=>$code, 'price'=>$price, 'quantity'=>1, 'image'=>$image)
    );

    // If your shopping cart is empty //
    if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        header("Location: customer-cart.php");
        exit();
    }
    
    // If your shopping cart has items already // 
    else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        
        // If the items you try to add already exists //
        if(in_array($code,$array_keys)) {
            echo 
            '<script>alert("This book already exists in your cart");
            window.location.href = "customer-cart.php";
            </script>';
            exit();
        } 

        // If the items you try to add still does exists //
        else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
            header("Location: customer-cart.php");
            exit();
        }   
    }    
}

mysqli_close($con);