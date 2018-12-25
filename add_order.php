<?php
include "global_module.php";


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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
	<h1>Add Order</h1>

	</div>

	<div class="container-fluid  neno_form row">
	<div class="col-md-2"></div>
	<form class="col-md-8 rounded bg-info text-white mb-3"  method=POST name="add_order_form">
	
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
		
		
		
		<hr>
		<div class="form-group ">
		<label for="client_name " class="text-white">Order id</label>
		<input type="text" class="form-control" readonly name="order_id"  value="<?php echo key_engine("ordr"); ?>">
		</div>
		
		<div class="form-group ">
		<label for="client_name" class="text-white">Select Client</label>
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
		

		<legend>Products</legend>
		
		<div class="row">
		
		<div class="form-group col-md-9">
		
		<select class="form-control"  onchange="add_product(this)">
		<option selected readonly>--SELECT PRODUCT--</option>
		<?php
		$conn = db_connect();
		if($conn)
		{
		$query = "select * from product";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			if(mysqli_num_rows($result) != 0)
			{
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo "<option value='". $data['product_id'] ."' >";
					echo $data['product_dimension']." ( ".$data['product_fpi']." FPI - ". $data['product_type'] ." )";
					echo "</option>";
				}
			}
			else
			{
				echo "<a href='add_product.php'><option > Add Product </option></a>";
			}
		}
		else
		{
			echo "<option> No Products Found </option>";
		}
		}
		else
		{
			echo "<option>Not connected</option>";
		}
		?>
		</select>
		</div>
		<div class="col-md-3">
			<button type="button" class="btn btn-dark" data-toggle="modal" style="height: 100%;width:100%" data-target=".bs-example-modal-lg">New Product</button>
		</div>
        </div>

            <fieldset class="text-white" ><legend >Selected Product</legend>
        <div class="row " id="select_product_container">

            <div class="col-md-3" >
                <label for="product_id_container" class="text-white">Product</label>
                <input type="text" class="form-control" id="product_id_container" readonly>
            </div>
            <div class="col-md-3" >
                <label for="product_ifsc_container" class="text-white">IFSC</label>
                <input type="text" class="form-control" id="product_ifsc_container" readonly>
            </div>
            <div class="col-md-3" >
                <label for="product_price_container" class="text-white">Price</label>
                <input type="text" class="form-control" id="product_price_container" readonly>
            </div>

            <div class="col-md-3" >
                <label for="product_fpi_container" class="text-white">FPI</label>
                <input type="text" class="form-control" id="product_fpi_container" readonly>
            </div>
            <div class="col-md-6" >
                <label for="product_type_container" class="text-white">Type</label>
                <input type="text" class="form-control" id="product_type_container" readonly>
            </div>
            <div class="col-md-3" >
                <label for="product_qty_container" class="text-white">Qauntity</label>
                <input type="text" class="form-control" id="product_qty_container" >
            </div>
            <div class="col-md-3 " >
                <label for="enlist_button"></label>
                <p class="btn btn-success btn-lg" style="width:100%" onclick="enlist_product(this)" id="enlist_button" >+</>
            </div>
        </div>
        <hr>
                <div class="container" id="table_container">
                    <table class="table table-borderless table-hover table-stripped table-dark rounded" id="invoice_item_table">
                        <thead>
                        <tr class="border-bottom">
                            <th scope="col">No.</th>
                            <th scope="col">Product</th>
                            <th scope="col">Ifsc</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody id="product_table_body">
                        <tr class="text-center" id="default_row ">
                            <th scope="row" colspan="6" >No Product Selected</th>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </fieldset>

		</fieldset>
		<hr>
		<div class="form-group ">
		<button class="btn btn-dark" style="height: 100%;width:100%" type="submit">Add</button>
		</div>
	</form>
	<div class="col-md-2"></div>
	</div>

	<!-- ADD NEW PRODUCT MODaL -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	  
		<div class="modal-content container">
		 <div class="modal-header">
        <h5 class="modal-title">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
		  <div class="container-fluid neno_form row">
	
	<form class="col-md-12 " method=POST name="add_product_from_order" action="add_product.php" >
	
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
		
		if(isset($_GET['alert_success']))
		{
			
			echo "
		<div class='alert alert-success alert-dismissible fade show' role='alert'>
		<strong>Success !</strong> ".$_GET['alert_success']."
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
		</button>
		</div>";
		}
		elseif(isset($_GET['alert_error']))
		{
			echo "
		<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		<strong>Error !</strong> Check You Query <br>".$_GET['alert_error']."
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
		<input type="file" class="form-control-file" name="product_design" >
		</div>
		
		<div class="form-group ">
		<button class="btn btn-lg btn-primary" name="submit_from_order" type="submit">Add</button>
		</div>
	</form>
	
	</div>
		  
		</div>
	  </div>
	</div>


	<!-- Main Js Integration -->
	<script type="text/javascript" src="content/source/js/style.js"></script>
	<script type="text/javascript" src="content/source/js/select_product.js"></script>
    <script type="text/javascript" src="content/source/js/enlist_product.js"></script>
	<!-- Bootstrap Js Integration -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.bundle.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.js"></script>
	<script type="text/javascript" src="content/source/js/bootstrap.min.js"></script>
</body>
</html>
