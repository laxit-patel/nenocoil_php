<?php
include "global_module.php";

if($_POST)
{
	$client_id = key_engine('client');
	$client_name = $_POST['client_name'];
	$client_email = $_POST['client_email'];
	$client_address = $_POST['client_address'];
	$client_gstin = $_POST['client_gstin'];
	$client_contact = $_POST['client_contact'];
	
	
	$query = "INSERT INTO `client` (`client_id`, `client_name`, `client_email`, `client_address`,  `client_gstin`, `client_contact`) VALUES ('$client_id', '$client_name', '$client_email', '$client_address', '$client_gstin', '$client_contact') ";
	
	if(insert_data($query))
	{
		$alert_success = "Client ". $client_name ." Added";
	}
	else
	{
		
		$alert_error = $query;
	}
	
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
	<h1>Add Client</h1>

	</div>

	<div class="container neno_form row">
	<div class="col-md-4"></div>
	<form class="col-md-6 " method=POST name="add_client_form">
	
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
		<label for="client_name" >Client Id</label>
		<input type="text" class="form-control" name="client_id"  value="<?php echo key_engine('client'); ?>" disabled>
		</div>
	
		<div class="form-group ">
		<label for="client_name" >Client Name</label>
		<input type="text" class="form-control" name="client_name"  placeholder="Enter Name Here">
		</div>
		
		<div class="form-group ">
		<label for="client_name" >Client Email</label>
		<input type="text" class="form-control" name="client_email"  placeholder="Enter Email Here">
		</div>
		
		<div class="form-group ">
		<label for="client_name" >Client GSTIN</label>
		<input type="text" class="form-control" name="client_gstin"  placeholder="Enter GSTING Here">
		</div>
		
		<div class="form-group ">
		<label for="client_name" >Client Address</label>
		<input type="text" class="form-control" name="client_address"  placeholder="Enter Address Here">
		</div>
		
		<div class="form-group ">
		<label for="client_name" >Client Contact</label>
		<input type="text" class="form-control" name="client_contact"  placeholder="Enter Contact Here">
		</div>
		
		<div class="form-group ">
		<button type="submit">Add</button>
		</div>
	</form>
	<div class="col-md-4"></div>
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
