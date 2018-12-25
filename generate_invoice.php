<?php
include("database.php");


if($_POST)
{
	$client_id = $_POST['client'];
	echo $client_id;
}
		
		
		

?>

<!doctype html>
<html lang="en">
<title>Neno Coil</title>
<head>
	<!--Required Meta Tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Main CSS Stylesheet -->
	<link rel="stylesheet" type="text/css" href="content/source/css/style.css">
	<!-- Bootstrap Css Stylesheet Integration -->
	<link rel="stylesheet" type="text/css" href="content/source/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="content/source/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="content/source/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="content/source/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="content/source/css/bootstrap-reboot.css">
	<link rel="stylesheet" type="text/css" href="content/source/css/bootstrap-reboot.min.css">
	
	<style>
		
	</style>
</head>
<body>
	<nav class="navbar neno-orange" >
		<a class="navbar-brand" href="index.php">
			<img src="content/media/images/logo.jpg" width="10%" height="8%" alt="NenoCoil Logo">
			
		</a>
	</nav>
	
	<div class="jumbotron text-center" >
	<h1>Generate Invoice</h1>
	
	</div>
	
	<div class="container neno_form row">
	<div class="col-md-4"></div>
	<form class="col-md-6" method=POST name="add_client_form">
	
		<?php
		
		if(isset($alert_success))
		{
			echo "
		<div class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Success !</strong> ".$alert_success."
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
		</button>
		</div>";
		}
		elseif(isset($alert_error))
		{
			echo "
		<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		<strong>Error !</strong> Check You Query <br>".$alert_error."
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
		</button>
		</div>";
		}
		?>
	
		<div class="form-group ">
		<label for="client_name" >Select Client</label>
		<select class="form-control"  name="client">
		<option selected readonly>--SELECT CLIENT--</option>
		<?php
		$conn = db_connect();
		if($conn)
	{
		$query = "select * from client";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			if(mysqli_num_rows($result) != 0)
			{
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo "<option value='". $data['client_id'] ."' >";
					echo $data['client_name'];
					echo "</option>";
				}
			}
			else
			{
				echo "<option> Add Client </option>";
			}
		}
		else
		{
			echo "<option> No Client found </option>";
		}
	}
	else
	{
		echo "<option>Not connected</option>";
	}
		?>
		</select>
		</div>
	
		
		
		<div class="form-group ">
		<button type="submit">Add</button>
		</div>
	</form>
	<div class="col-md-4"></div>
	</div>
		
		
		
		
		
		
		
		
	</div>
	
	<!-- Main Js Integration -->
	<script type="text/javascript" src="content/source/js/style.js"></script>
	<!-- Bootstrap Js Integration -->
	<script type="text/javascript" src="content/source/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.min.js"></script>
</body>
</html>