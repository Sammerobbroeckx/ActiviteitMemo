<?php

//PHP Functions

//LinkDB
function LinkDB()
{
	$servername = "localhost";
	$username = "root";
	$password = "root";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
	return $conn;
}

//Login
function Login($pass, $mail)
{

}

?>