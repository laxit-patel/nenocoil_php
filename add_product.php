<?php
include "global_module.php";

if($_POST)
{
	$product_id = $_POST['product_id'];
	$product_dimensions = $_POST['product_dimensions'];
	$product_ifsc = $_POST['product_ifsc'];
	$product_price = $_POST['product_price'];
	$product_type = $_POST['product_type'];
	$product_fpi = $_POST['product_fpi'];
	
	$flag = "";
	$validation_error = array();
	
	
	if($product_ifsc == "")
	{
		$flag = "invalid";
		$validation_error[] = "IFSC code is Empty";
	}
	if($product_price == "")
	{
		$flag = "invalid";
		$validation_error[] = "Price is Empty";
	}
	if($product_dimensions == "")
	{
		$flag = "invalid";
		$validation_error[] = "Product Dimension is Empty";
	}
	if($product_fpi == "")
	{
		$flag = "invalid";
		$validation_error[] = "FPI is Empty";
	}
	if($product_type == "")
	{
		$flag = "invalid";
		$validation_error[] = "Select Product Type";
	}
	
	
	
	if($flag != "invalid")
	{
		$query = "INSERT INTO `product` (`product_id`, `product_dimension`, `product_ifsc`, `product_price`,  `product_type`, `product_fpi`) 
		VALUES ('$product_id', '$product_dimensions', '$product_ifsc', '$product_price', '$product_type', '$product_fpi') ";
		if(insert_data($query))
		{
			$alert_success = "Product ". $product_dimensions ." Added";
			//redirecting data to add order page
			if(isset($_POST['submit_from_order']))
			{
				header("Location: add_order.php?alert_success=$alert_success");
			}
			
			
	  
		}
		else
		{
			$alert_error = $query;
			//redirecting data to add order page
			if(isset($_POST['submit_from_order']))
			{
				header("Location: add_order.php?alert_error=$alert_error");
			}
		}
	}
	else
	{
		//redirecting data to add order page
			if(isset($_POST['submit_from_order']))
			{
				header("Location: add_order.php?flag=$flag&validation_error=$validation_error");
			}
		
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
	<h1>Add Product</h1>

	</div>

	<div class="container neno_form row">
	<div class="col-md-4"></div>
	<form class="col-md-6 " method=POST name="add_order_form" >
	
		<?php
		
		if(isset($flag))
		{
			if($flag == "invalid")
			{
				foreach($validation_error as $error)
				{
					echo "
			<div class='alert alert-danger alert-dismissible fade show' role='alert'>
			<strong>Error !</strong> ".$error."
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
			</button>
			</div>";
				}
			}
		}
		
		
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
		if(isset($alert_error))
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
		
		
		
		
		
		
		<div class=row>
			<div class="col-md-2"></div>
				<div class="form-group col-md-3">
				<label for="client_name" >Product id</label>
				<input type="text" class="form-control" name="product_id"  value="<?php echo key_engine("product"); ?>">
				</div>
			<div class="col-md-2"></div>
				<div class="form-group col-md-3">
				<label for="client_name" >Product IFSC</label>
				<input type="text" class="form-control" name="product_ifsc" value="<?php if(isset($product_ifsc)){ echo $product_ifsc; } ?>">
				</div>
			<div class="col-md-2"></div>
		</div>
		
		<div class="form-group ">
		<label for="client_name" >Product Dimension</label>
		<input type="text" class="form-control" name="product_dimensions" value="<?php if(isset($product_dimensions)){ echo $product_dimensions; } ?>">
		</div>
		
		<div class="form-group ">
		<label for="product_type" >Product type</label>
		<select class="form-control" name="product_type">
			<option value="">-- Select Product Type --</option>
			<option>Condencer</option>
			<option>Coil</option>
			<option>Evaporator</option>
		</select>
		</div>
		
		<div class=row>
			<div class="col-md-2"></div>
				<div class="form-group col-md-3">
				<label for="client_name" >Product FPI</label>
				<input type="text" class="form-control" name="product_fpi" value="<?php if(isset($product_fpi)){ echo $product_fpi; } ?>">
				</div>
			<div class="col-md-2"></div>
				<div class="form-group col-md-3">
				<label for="client_name" >Product Price</label>
				<input type="text" class="form-control" name="product_price" value="<?php if(isset($product_price)){ echo $product_price; } ?>">
				</div>
			<div class="col-md-2"></div>
		</div>
		
		<div class="form-group ">
		<label for="client_name" >Product Design</label>
		<input type="file" class="form-control" name="product_design" >
		</div>
		
		<div class="form-group ">
		<button  type="submit" name="submit_from_product">Add</button>
		</div>
	</form>
	<div class="col-md-4"></div>
	</div>




	<!-- Main Js Integration -->
	<script type="text/javascript" src="content/source/js/style.js"></script>
	<!-- Bootstrap Js Integration -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.min.js"></script>
</body>
</html>
