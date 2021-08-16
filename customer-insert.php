<?php

include("conn.php");

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$state = $_POST['state'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if(isset($_POST['submit'])) {
    $result = mysqli_query($con, "SELECT * FROM customers WHERE customer_email='".$email."'");
    $num_rows = mysqli_num_rows($result);
    
    //Checks whether the email is already registered// 
    if($num_rows >= 1){
        header("Location: register.php?error=registered&first_name=".$first_name."&last_name=".$last_name."&dob=".$dob."&address=".$address."&city=".$city."&postal_code=".$postal_code."&state=".$state);
        exit();
    }   
    
    //Checks whether password matches the 'confirm password' box//
    elseif($password != $cpassword){
        header("Location: register.php?error=passwordcheck&first_name=".$first_name."&last_name=".$last_name."&dob=".$dob."&address=".$address."&city=".$city."&postal_code=".$postal_code."&state=".$state."&email=".$email);
        exit();
    }
    
    else{
        $result2 = mysqli_query($con, "SELECT * FROM employees WHERE employee_email='".$email."'");
        $num_rows2 = mysqli_num_rows($result2);

        if($num_rows2 >= 1){
            header("Location: register.php?error=registered&first_name=".$first_name."&last_name=".$last_name."&dob=".$dob."&address=".$address."&city=".$city."&postal_code=".$postal_code."&state=".$state);
            exit();
        }

        else{
            $result3 = mysqli_query($con, "SELECT * FROM managers WHERE manager_email='".$email."'");
            $num_rows3 = mysqli_num_rows($result3);

            if($num_rows2 >= 1){
                header("Location: register.php?error=registered&first_name=".$first_name."&last_name=".$last_name."&dob=".$dob."&address=".$address."&city=".$city."&postal_code=".$postal_code."&state=".$state);
                exit();
            }
            else{
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO customers (customer_fname, customer_lname, customer_dob, customer_address, customer_city, customer_zipcode, customer_state, customer_email, customer_password) 
                        VALUES('$first_name','$last_name','$dob','$address','$city','$postal_code','$state','$email','$hash')";
            }
        }
    }
}

// If the query cannot be executed //
if (!mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
}

// Redirects the users to the login page after creating an account //
echo '<script type="text/javascript">alert("Account Successfully Created!");
window.location.href="login.php";</script>';

mysqli_close($con);