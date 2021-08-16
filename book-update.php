<?php

include("conn.php");

$image = $_FILES['book_image']['name'];

$sql = "UPDATE books SET
book_name ='$_POST[book_name]',
book_author='$_POST[author]',
book_publisher='$_POST[publisher]',
book_price='$_POST[price]',
book_genre='$_POST[genre]',
book_pic = '$image'

WHERE bookID = $_POST[book_id];";

if (mysqli_query($con, $sql)) {

mysqli_close($con);
header('Location: book-view.php');
}