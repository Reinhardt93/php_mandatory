<?php
session_start();
include("functions/functions.php");

?>
<!DOCTYPE>

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
			<div id="content_area">

			<?php cart(); ?>



				<div id="products_box">

				<?php
				if(!isset($_SESSION['customer_email'])){

					include("customer_login.php");
				}
				else {

				include("payment.php");

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
