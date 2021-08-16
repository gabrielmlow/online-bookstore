<?php

include('conn.php');
session_start();

$old_password = $_POST['oldpassword'];
$new_password = $_POST['newpassword'];
$confirm_password = $_POST['confirmpassword'];
$id = $_SESSION['mySession'];

if(isset($_POST['submit'])){
    $sql = "SELECT * FROM customers WHERE customer_id = '$id'";
    $result = mysqli_query($con, $sql);

    while($fetch = mysqli_fetch_array($result)){

        // If the customer's password is correct //
        if (password_verify($old_password, $fetch['customer_password'])){

            // If the password matches
            if ($new_password == $confirm_password){

                // Updating the password
                $hash = password_hash($new_password, PASSWORD_DEFAULT);
                mysqli_query($con, "UPDATE customers SET customer_password = '$hash' WHERE customer_id = '$id'");
            }

            // If the password does not match
            else{
                header("location: customer-change-password.php?error=passwordwrong");
                exit();
            }

        }

        // If the customer's password is incorrect //
        else {
            header("location: customer-change-password.php?error=passwordcheck");
            exit();
        }
    }
}

// Redirects the users to the login page after updating password //
echo '<script type="text/javascript">alert("Password Successfully Updated!");
window.location.href="customer-settings.php";</script>';

mysqli_close($con);