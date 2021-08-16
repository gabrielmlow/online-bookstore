<?php
// Establishing connection to database //
$con = mysqli_connect("localhost","root","","bookshop");

//Checking the connection //
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>