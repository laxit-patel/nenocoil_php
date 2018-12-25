<?php



function db_connect()
{
	$server = "localhost";
	$database = "nenocoil";
	$username = "root";
	$password = "";
	
	return $conn = mysqli_connect($server, $username, $password, $database);
}

?>