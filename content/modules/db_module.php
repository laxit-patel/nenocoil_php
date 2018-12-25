<?php
require_once(dirname(__FILE__)."\..\database\database_mysqli.php");

function show($query,$mode)
{
	$conn = reconnect();
	if($mode == "RESULTARRAY")
	{
		$result = mysqli_query($conn,$query);
		if($result)
		{
			$row = mysqli_fetch_array($result);
			RETURN $row;
		}
		else
		{
			RETURN FALSE;
		}
	}
	elseif($mode == "RESULTASSOC")
	{
	$result = mysqli_query($conn,$query);
	if($result)
	{
		$row = mysqli_fetch_assoc($result);
		RETURN $row;
	}
	else
	{
		RETURN FALSE;
	}
	}
}

?>