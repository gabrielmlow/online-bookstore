<?php

include("conn.php");

$book_name = $_POST['book_name'];
$author = $_POST['author'];
$publisher = $_POST['publisher'];
$genre = $_POST['genre'];
$price = $_POST['price'];
$stock = $_POST['stock'];

// Directory of uploads folder //
$targetDir = "uploads/";

// Returns trailing name component of path // 
$fileName = basename($_FILES["book_image"]["name"]);

// To make the image path (uploads/image_name) // 
$targetFilePath = $targetDir . $fileName;

// Checking the file type // 
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


if (isset($_POST['submit'])){

    $result = mysqli_query($con, "SELECT * FROM books WHERE bookName='".$book_name."'");
    $num_rows = mysqli_num_rows($result);

    // Formats allowed //
    $allowTypes = array('jpg','png','jpeg','pdf');

    // Checks if book name exists //
    if ($num_rows >= 1){
        header("Location: book-add.php?error=bookexists");
        exit();
    }

    // If the book does not exist yet //
    else{

        // If file type is correct and if a value exists // 
        if (in_array($fileType, $allowTypes)){

            // Uploading file to server // 
            if(move_uploaded_file($_FILES["book_image"]["tmp_name"], $targetFilePath)){

                // Insert data into database // 
                $sql = "INSERT INTO books (bookName, bookAuthor, bookPublisher, bookGenre, bookPrice, bookStock, bookPic)
                VALUES ('$book_name', '$author', '$publisher', '$genre', '$price', '$stock', '$fileName')";
            }
        }

        // If the file type is not supported // 
        else{
            echo '<script type="text/javascript">alert("File type not supported!");
            window.location.href="book-add.php?book_name="'.$book_name.'&author='.$author.'&publisher='.$publisher.'&genre='.$genre.'&price='.$price.'&stock='.$stock.';</script>';
        }
    }
}

if (!mysqli_query($con,$sql)){
    die('Error: ' . mysqli_error($con));
}

echo '<script type="text/javascript">alert("Book Successfully Saved!");
window.location.href="book-add.php";</script>';

mysqli_close($con);