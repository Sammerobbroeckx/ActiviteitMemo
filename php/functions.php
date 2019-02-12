<?php
session_start();
	
//PHP Functions

if(isset($_POST["mail"]))
{
	Login($_POST["pass"], $_POST["mail"]);
}

//Login
function Login($pass, $mail)
{
	$sql = "select ID, Password from user Where Mail = '".$mail."'";
	
	require_once("LinkDB.php");
	
	$result = mysqli_query($conn, $sql);
	
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

//Function GetMemo
function GetMemo()
{
	
}

?>