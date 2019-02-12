<?php
session_start();

$q = $_GET['q'];

require("LinkDB.php");

mysqli_select_db($conn,"activiteitenmemo");

if($q == "*")
{
	$sql="SELECT * FROM memo WHERE UserID='".$_SESSION["UserID"]."'";
}
else
{
	$sql="SELECT * FROM memo WHERE Omschrijving LIKE '%".$q."%' AND UserID='".$_SESSION["UserID"]."'";
}

$result = mysqli_query($conn,$sql);

echo '<div class="list-group">';

while($row = mysqli_fetch_array($result)) 
{
    echo '<a href="PHP/ActiviteitIndividueel.php?q='.$row["ID"].'" class="list-group-item">"'.$row["Omschrijving"].'" <span class="badge text-right">'.$row["Einddatum"].'</span></a></form>';
}
echo "</div>";

mysqli_close($conn);
?>