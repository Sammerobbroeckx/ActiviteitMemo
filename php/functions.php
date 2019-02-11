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
	$sql = "";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) == 0) 
	{
		echo "No rows found, nothing to print so am exiting";
		exit;
	}
	
	while ($row = mysql_fetch_assoc($result)) 
	{
		echo $row["userid"];
		echo $row["fullname"];
	}

	mysql_free_result($result);
}

?>