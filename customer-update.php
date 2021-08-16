<?php

include("conn.php");
session_start();

if (isset($_POST['submit'])){

    $id = $_SESSION['mySession'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    
    $sql = 
    "UPDATE customers 
    SET customer_fname ='$first_name', customer_lname ='$last_name', customer_dob ='$dob', customer_address='$address', customer_city ='$city', customer_state = '$state', customer_zipcode = '$zipcode'
    WHERE customer_id = '$id';";
    
    mysqli_query($con, $sql);

    echo '<script type="text/javascript">alert("Changes successfully saved!");
    window.location.href="customer-settings.php";</script>';
}

mysqli_close($con);
