<?php
session_start();

include("functions/functions.php");

?>
<!DOCTYPE>
<html>
	<head>
		<title>My Online Shop</title>

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
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
				<a href="index.php"><img id="logo" src="images/logo.gif" /> </a>
				<img id="banner" src="images/ad_banner.gif" />
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

						<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

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
<!--Main Container ends here-->
		<!--Content wrapper starts-->
		<div class="content_wrapper">

			<div id="sidebar">

				<div id="sidebar_title">Categories</div>

				<ul id="cats">

				<?php getCats(); ?>

				<ul>

				<div id="sidebar_title" class="brands">Brands</div>

				<ul id="cats">
					<?php getBrands(); ?>
				<ul>
			</div>

			<div id="content_area">

			<?php cart(); ?>
				<div id="products_box">

				<?php getPro(); ?>
				<?php getCatPro(); ?>
				<?php getBrandPro(); ?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->
		<?php require('includes/footer.php'); ?>
</body>
</html>
