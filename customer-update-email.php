<?php

include("conn.php");
session_start();

if (isset($_POST['submit'])){

    $id = $_SESSION['mySession'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM customers WHERE customer_id = '$id'";
    $result = mysqli_query($con, $sql);

    while($fetch = mysqli_fetch_array($result)){
        
        // If the customer's password is correct //
        if (password_verify($password, $fetch['customer_password'])){

            $old_email = mysqli_query($con, "SELECT * FROM customers WHERE customer_email = '$email'");
            $num_rows = mysqli_num_rows($old_email);

            // If email address is not in use //
            if ($num_rows == 0){

                mysqli_query($con, "UPDATE customers SET customer_email = '$email' WHERE customer_id = '$id'");

            }

            // If email address is already used //
            else{
                header("Location: customer-change-email.php?error=emailused&email=".$email);
                exit();
            }

    }

    // If the customer's password is incorrect // 
        else{
            header("Location: customer-change-email.php?error=wrongpassword&email=".$email);
            exit();
        }
    }    
}

// Redirects the users to the login page after updating email //
echo '<script type="text/javascript">alert("Email Successfully Updated!");
window.location.href="customer-settings.php";</script>';

mysqli_close($con);