<!DOCTYPE>
<?php

include("functions/functions.php");

?>
<html>
	<head>
		<title>My Online Shop</title>


	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>
<?php require('includes/menu.php') ?>
	<!--Main Container starts here-->
	<div class="main_wrapper">

		<!--Header starts here-->
		<div class="header_wrapper">
			<div class="header_column">
				<a href="index.php"><img id="logo" src="images/logo.png" /> </a>
			</div>

		<!--Header ends here-->

		<!--Navigation Bar starts-->
		<div class="header_column">
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input id="submittext" type="text" name="user_query" placeholder="Search a Product"/ >
					<input id="submitsubmit" type="submit" name="search" value="Search" />
				</form>
			</div>
		</div>
		<div class="header_column">
			<div id="shopping_cart">

					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

					Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total Items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>



					</span>
			</div>
		</div>
</div>
		</div>
		<!--Navigation Bar ends-->

		<!--Content wrapper starts-->
<div class="top-menu" style="height:115px;">
			<div id="sidebar">

				<div id="sidebar_title">Categories</div>

				<ul id="cats">

				<?php getCats(); ?>

				<ul>

				<div id="sidebar_title">Brands</div>

				<ul id="cats">

					<?php getBrands(); ?>

				<ul>


			</div>
</div>
<div class="content_wrapper">
			<div id="content_area">

				<div id="products_box">
	<?php
	$get_pro = "select * from products";

	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){

		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];

		echo "
				<div id='single_product'>

					<h3>$pro_title</h3>

					<img src='admin_area/product_images/$pro_image' width='180' height='180' />

					<p><b> $ $pro_price </b></p>

					<a id='singleprod' href='details.php?pro_id=$pro_id>Details</a>

					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>

				</div>


		";

	}
	?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->
		<?php require('includes/footer.php'); ?>
	</div>
<!--Main Container ends here-->


</body>
</html>
