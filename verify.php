<?php

include("conn.php");
session_start();

// Checks whether the form sent data // 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $sql = "SELECT * FROM customers WHERE customer_email = '$email';";
    $result = mysqli_query($con, $sql);

    // If email is not found in customers table //
    if (mysqli_num_rows($result) == 0){

        // Search for the email in the employees table // 
        $sql2 = "SELECT * FROM employees WHERE employee_email = '$email';";
        $result2 = mysqli_query($con, $sql2);

        // If the email is not found in the employeee table //
        if (mysqli_num_rows($result2) == 0){

            $sql3 = "SELECT * FROM managers WHERE manager_email = '$email';";
            $result3 = mysqli_query($con, $sql3);

            // If the email cannot be found in the managers table //
            if (mysqli_num_rows($result3) == 0){

                // Email does not exist at all //
                header("location: login.php?error=invalidemail&email=".$email);
                exit();
            }

            // If the email is found in the managers table //
            elseif (mysqli_num_rows($result3) == 1){

                while($fetch = mysqli_fetch_array($result3)){
    
                    // If the manager's password is correct //
                    if (password_verify($password, $fetch['manager_password'])){
                        $_SESSION["mySession"] = $fetch['manager_id'];

                        // Records that the one logged in is a manager //
                        $_SESSION["position"] = "Manager";
                        header("Location: manage-index.php");
                        exit();
                    }
        
                    // If the manager's password is incorrect //
                    else {
                        header("location: login.php?error=wrongpassword&email=".$email);
                        exit();
                    }
                }
            }
        }

        // If the email is found in the employeee table //
        elseif (mysqli_num_rows($result2) == 1){

            while($fetch = mysqli_fetch_array($result2)){

                // If the employee's password is correct //
                if (password_verify($password, $fetch['employee_password'])){
                    $_SESSION["mySession"] = $fetch['employee_id'];

                    // Records that the one logged in is an employee //
                    $_SESSION["position"] = "Employee";
                    header("Location: manage-index.php");
                    exit();
                }
    
                // If the employee's password is incorrect //
                else {
                    header("location: login.php?error=wrongpassword&email=".$email);
                    exit();
                }
            }
        }
    }

    // If the email belongs to a customer //
    elseif (mysqli_num_rows($result) == 1){

        while($fetch = mysqli_fetch_array($result)){

            // If the customer's password is correct //
            if (password_verify($password, $fetch['customer_password'])){
                $_SESSION["mySession"] = $fetch['customer_id'];
                $_SESSION["first_name"] = $fetch['customer_fname'];
                $_SESSION['user_email'] = $fetch['customer_email'];
                header("Location: customer-index.php");
                exit();
            }

            // If the customer's password is incorrect //
            else {
                header("location: login.php?error=wrongpassword&email=".$email);
                exit();
            }
        }
    }
}

    /* If the email exists 
    if (mysqli_num_rows($result) > 0){

        while($fetch = mysqli_fetch_array($result)){

            if (password_verify($password, $fetch['userPassword'])){              
                $_SESSION['mySession'] = $fetch['userType'];
                $_SESSION["userFName"] = $fetch['userFName'];

                // If the user is a customer //
                if ($fetch['userType'] == 'Customer'){
                    header("Location: index.php");
                }
                
                // If the user is a manager //
                elseif ($fetch['userType'] == 'Manager'){
                    header("location: manage-index.php");
                }
                
                // If the user is an employee //
                elseif ($fetch['userType'] == 'Employee'){
                    header("location: manage-index.php");
                }
            }

            // If password is not correct based on the email //
            else {
                header("location: login.php?error=wrongpassword");
            }
        }

    }

    // If the email does not exist in the database //
    else {
        header("location: login.php?error=invalidemail");
    }
    
mysqli_close($con); 

}

   /*if ($result = mysqli_query($con, $sql)){

        // Return the number of rows from query //
        $rowcount = mysqli_num_rows($result);
        
        
        if ($rowcount == 1){

            while($fetch = mysqli_fetch_array($result)){

            $_SESSION['mySession'] = $email;
            $_SESSION["userFName"] = $fetch['userFName'];
            
            
                if ($fetch['userType'] == 'Customer'){
                header("Location: index.php?user=".$_SESSION["userID"]);
                }
                
                elseif ($fetch['userType'] == 'Manager'){
                header("location: manage-index.php?user=manager");
                }
            
                elseif ($fetch['userType'] == 'Employee'){
                header("location: manage-index.php?user=employee");
                }
            }
                
        }

        // If the email exists but the password is incorrect //
        else {
            header("location: login.php?error=invalidemailorpass");
        }
    }
mysqli_close($con);*/

