<?php


if(isset($_GET))
{

	echo "Form Submitted";

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
  <h1>Bender</h1>
  <h3>Online Distibutor Length Calculator</h3>
  </div>

	<div class="container neno-border">
    <form  method="GET" action="test.php" name="bender_form">

			<div class="row">
			<div class="form-group col-md-3">
				<label for="valve_type">Choose Valve</label>
  		<select class="form-control" id="valve_type">
				<option>1/2</option>
				<option>3/8</option>
				<option>5/8</option>
			</select>
  		</div>
			<div class="form-group col-md-3">
				<label for="inlet_type">Choose Inlet</label>
  		<select class="form-control" id="inlet_type">
				<option>1/2</option>
				<option>3/8</option>
				<option>5/8</option>
			</select>
  		</div>
  		<div class="form-group col-md-6">
				<label for="inlet_size">Choose Inlet Size</label>
  		<input type="range" class="form-control-range" id="inlet_size">
  		</div>
		</div>

		<div class="row">
		<div class="form-group col-md-3">
			<label for="distributor_type">Choose Distributor</label>
		<select class="form-control" id="distributor_type">
			<option>2 way</option>
			<option>3 way</option>
			<option>4 way</option>
		</select>
		</div>
		<div class="form-group col-md-3">
			<label for="outlet_type">Choose Outlet</label>
		<select class="form-control" id="outlet_type">
			<option>1/4</option>
			<option>3/8</option>

		</select>
		</div>
		<div class="form-group col-md-6">
			<label for="outlet_size">Choose Outlet Size</label>
		<input type="range" class="form-control-range" id="outlet_size">
		</div>
	</div>

	<div class="row">
	<div class="form-group col-md-9">
		<label for="bending_size">Bending Size</label>
		<input type="range" class="form-control-range" id="bending_size">
	</div>
		<div class="form-group col-md-3">
			<input type="submit" class="btn btn-success form-control" value="Generate">
		</div>
	</div>
  	</form>
	</div>

	 <div class="jumbotron neno-border bending_result text-center">

		 <h1 >Result</h1>
		 <?php

		 if(isset($result))
		 {
			 echo "<p>. $result .</p>";
		 }

		 ?>
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
