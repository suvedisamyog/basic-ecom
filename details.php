<?php
require './db.php';
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Ecommerce</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/jquery2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style></style>
</head>

<body>


	<div class="wait overlay">
		<div class="loader"></div>
	</div>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">	
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
						<span class="sr-only">navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand">Ecommerce Site</a>
				</div>
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
					<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Products</a></li>
				</ul>
				<form class="navbar-form navbar-left">
					<div class="form-group">
					  <input type="text" class="form-control" placeholder="Search" id="search">
					</div>
					<button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
				 </form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge" >0</span></a>
						<div class="dropdown-menu" style="width:400px;">
							<div class="panel panel-success">
								<div class="panel-heading" >
									<div class="row">
										<div class="col-md-3">Sl.No</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
									</div>
								</div>
								<div class="panel-body">
									<div id="cart_product">
									<div class="row">
										<div class="col-md-3">Sl.No</div>
										<div class="col-md-3">Product Image</div>
										<div class="col-md-3">Product Name</div>
										<div class="col-md-3">Price in $.</div>
									</div>
									</div>
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Login/Register</a>
						<ul class="dropdown-menu">
							<div style="width:300px;">
								<div class="panel panel-primary">
									<div class="panel-heading">Login</div>
									<div class="panel-heading">
										<form onsubmit="return false" id="login">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" id="email" required/>
											<label for="email">Password</label>
											<input type="password" class="form-control" name="password" id="password" required/>
											<p><br/></p>
											<input type="submit" class="btn btn-warning" value="Login">
											<a href="customer_registration.php?register=1" style="color:white; text-decoration:none;">Create Account Now</a>
										</form>
									</div>
									<div class="panel-footer" id="e_msg"></div>
								</div>
							</div>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>	
<br>
<br>
<br>
<br>
<br>
<div>
	<center>
	   <a href="./">Go Back</a>
	</center>
</div>
<br>
<br>
<br>

<?php

$id=$_GET['id'];


            $pro_id    = "No";
			$pro_cat   = "No";
			$pro_brand = "No";
			$pro_title = "No";
			$pro_price = "No";
			$pro_image = "No";
	

$product_query = "SELECT * FROM products where product_id='$id'";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_desc  = $row['product_desc'];
			$pro_key   = $row['product_keywords'];

	}
	}
	
	$sqlbrand="select brand_title from brands where brand_id='$pro_brand' ";
	$run_query2 = mysqli_query($con,$sqlbrand);
	if(mysqli_num_rows($run_query2) > 0){
		$brand=mysqli_fetch_array($run_query2)['brand_title'];
		

}
else{
	$brand=["NO"];
}

$sqlcat="select cat_title from categories where cat_id='$pro_cat' ";
$run_query3 = mysqli_query($con,$sqlcat);
if(mysqli_num_rows($run_query2) > 0){
	$cat=mysqli_fetch_array($run_query3)['cat_title'];
	

}
else{
$cat=["NO"];
}
	

?>


	<section class="padding-y bg-white shadow-sm mt-5 container-fluid ">
		<div class="container">
			<div class="row">
				<aside class="col-lg-6">
					<article class="gallery-wrap">
						<div class="img-big-wrap img-thumbnail"> <a href="#">
								<img height="520" src="./product_images/<?php echo $pro_image; ?>">
					
					</article> 
				</aside>
				<div class="col-lg-6">
					<article class="ps-lg-3">
						<h4 class="title text-dark"><center><?php echo $pro_title; ?></center></h4>
						<br>
						<div class="rating-wrap my-3">
							</span> <i class="dot"></i> <span class="label-rating ">Verified</span>
							
						</div> 
						<br>
						<div class="mb-3"> <var class="price h4">Rs <?php echo $pro_price; ?><var> 
						</div>
						<br>
						<p><?php echo $pro_desc ?></p>
						<br>
						<table class="table">
							<tr>
								<th>BRAND</th>
								<th>CATEGORY</th>
							</tr>
							<tr>
								<td><?php echo $brand; ?></td>
								<td><?php echo $cat	; ?></td>
							</tr>
						</table>
						
						<hr>
						<div class="row">
						
							
						</div>
						 <button class="btn btn-success">
                            BUY NOW 
						 </button>
						 <button class="btn btn-warning" id="product">
                             ADD TO CART
						 </button>
							<br>
							<br>
							<br>

							<div>
								keyword:
							</div>
							<div>
								<?php echo $pro_key; ?>
							</div>
					</article> 
				</div> 
			</div> 
		</div> 
	</section>


</body>

</html>