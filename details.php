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

		<!--Navigation Bar starts-->
	<?php require('includes/menu.php') ?>
		<!--Navigation Bar ends-->

		<!--Main Container starts here-->
		<div class="main_wrapper">

			<!--Header starts here-->
			<div class="header_wrapper">
				<div class="header_column">
					<a href="index.php"><img id="logo" src="images/logo.png" /> </a>
				</div>
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

							<span style="float:right; font-size:14px; padding:5px; line-height:40px;">

							<?php
							if(isset($_SESSION['customer_email'])){
							echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:yellow;'>Your</b>" ;
							}
							else {
							echo "<b>Welcome Guest:</b>";
							}
							?>

							<p>Shopping Cart - Total Items: <?php total_items();?> Total Price: <?php total_price(); ?></p> <a href="cart.php">Go to Cart</a>

							<?php
							if(!isset($_SESSION['customer_email'])){

							echo "<a href='checkout.php' style='color:orange;'>Login</a>";

							}
							else {
							echo "<a href='logout.php' style='color:orange;'>Logout</a>";
							}
							?>
							</span>
					</div>
				</div>
			</div>
			<!--Header ends here-->
		</div>
		<div class="top-menu">

			<div id="sidebar">

				<div id="sidebar_title">Categories</div>

				<ul id="cats">

				<?php getCats(); ?>

				<ul>
	<!--
				<div id="sidebar_title" class="brands">Brands</div>

				<ul id="cats">
					<?php getBrands(); ?>
				<ul>-->
			</div></div>
	<!--Main Container ends here-->
			<!--Content wrapper starts-->
			<div class="content_wrapper">

			<div id="content_area">

				<div id="products_box">
	<?php
	if(isset($_GET['pro_id'])){

	$product_id = $_GET['pro_id'];

	$get_pro = "SELECT * from products where product_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){

		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];

		echo "
				<div id='single_product'>

					<h3>$pro_title</h3>

					<img src='admin_area/product_images/$pro_image' width='400' height='300' />

					<p><b> $ $pro_price </b></p>

					<p>$pro_desc </p>

					<a href='index.php' id='singleprod'>Go Back</a>

					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>

				</div>


		";

	}
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
