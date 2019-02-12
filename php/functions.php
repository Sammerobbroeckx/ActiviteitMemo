<?php
session_start();
	
//PHP Functions

if(isset($_POST["mail"]))
{
	Login($_POST["pass"], $_POST["mail"]);
}

//LinkDB
function LinkDB()
{

	$servername = "localhost";
	$username = "root";
	$password = "usbw";
	$database = "activiteitenmemo";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

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
	$sql = "select ID, Password from user Where Mail = '".$mail."'";
	
	$result = mysqli_query(LinkDB(), $sql);
	
	if (mysqli_num_rows($result) == 0) 
	{
		echo "No rows found, nothing to print so am exiting";
		exit;
	}
	
	while ($row = mysqli_fetch_assoc($result)) 
	{
		if ($row["Password"] == $pass)
        {   
            $_SESSION["UserID"] = $row["ID"];
        }
	}

	mysqli_free_result($result);
	echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
}

?>