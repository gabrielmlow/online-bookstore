<?php

include("conn.php");

// Get the variable //
$id = ($_GET['BookID']);

$result = mysqli_query($con,"DELETE FROM books WHERE BookID=$id");

mysqli_close($con); 

header('Location: book-view.php');