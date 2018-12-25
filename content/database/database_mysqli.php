<?php



function reconnect()
{
$servername = "localhost";
$username = "root";
$password = "";
$database = "nenocoil";	
	
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die("Connection Failed".mysqli_connect_error());
}
else
{
	return $conn;
}
}
?>