<?php

//PHP Functions

//LinkDB
function LinkDB()
{
	$servername = "localhost";
	$username = "root";
	$password = "usbw";

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
	$sql = "select ID, Password from user Where Mail = "$mail";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) == 0) 
	{
		echo "No rows found, nothing to print so am exiting";
		exit;
	}
	
	while ($row = mysql_fetch_assoc($result)) 
	{
		if ($row["Password"] == $pass)
        {   
            $_SESSION["UserID"] = $row["ID"];
        }
	}

	mysql_free_result($result);
}

?>