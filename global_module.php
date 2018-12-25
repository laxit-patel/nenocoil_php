<?php
include "database.php";



function insert_data($query)
{
	$conn = db_connect();
	if($conn)
	{
		$result = mysqli_query($conn, $query);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return "Database Connection Failed";
	}
	
}

function key_engine($for)
	{
		if($for == 'client')
		{
			$raw_initial = "clnt";
		}
		elseif($for == 'ordr')
		{
			$raw_initial = "ordr";
		}
		elseif($for == 'product')
		{
			$raw_initial = "prdt";
		}
		$conn = db_connect();
		if($conn)
		{
			
				$key = $for."_id";
				
				$sql_test = "select $key from $for order by cast(substring($key,9) as int ) desc limit 1"; 
				$result_test = mysqli_query($conn,$sql_test);
			
				if($result_test)
				{
					if( mysqli_num_rows($result_test) != 0 )
					{
						$row=mysqli_fetch_row($result_test); //$row gets the key_val array
						
						$data = explode("_",$row[0]); // key_val explodes and saved in $data
						
						$year = $data[0];
						$initial = $data[1];
						$number = $data[2];
						$year_new = date("y");
						$number_new = $number+1;
						$key = $year_new."_".$initial."_".$number_new;
						
						return $key;
					}	
				else
					{
					   $year_new = date("y");
						$initial = $for;
						$number_new = 0;
						$initial = $raw_initial;
						$key = $year_new."_".$initial."_".$number_new;
						return $key;
					}
				}
				else
				{
					return "Query Failed ".$sql_test;
				}
			
		}
		else
		{
			return "Not Connected To Database";
		}
	}
	
	?>