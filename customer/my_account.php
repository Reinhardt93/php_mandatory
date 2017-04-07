<?php
session_start();
include("../functions/functions.php");

?>
<!DOCTYPE>
<html>
	<head>
		<title>My Online Shop</title>


	<link rel="stylesheet" href="../styles/style.css" media="all" />
	</head>

<body>

		<!--Navigation Bar starts-->
		<div class="menubar">

		  <ul id="menu">
		    <li><a href="../index.php">Home</a></li>
		    <li><a href="../all_products.php">All Products</a></li>
		    <li><a href="../customer/my_account.php">My Account</a></li>
		    <li><a href="../customer_register.php">Sign Up</a></li>
		    <li><a href="../cart.php">Shopping Cart</a></li>
		  </ul>

		</div>

		<!--Navigation Bar ends-->

		<!--Main Container starts here-->
		<div class="main_wrapper">

			<!--Header starts here-->
			<div class="header_wrapper">
				<div class="header_column">
					<a href="../index.php"><img id="logo" src="../images/logo.png" /> </a>
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

							echo "<a href='../checkout.php' style='color:orange;'>Login</a>";

							}
							else {
							echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
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

			<?php cart(); ?>

			<div id="shopping_cart">

					<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

					<?php
					if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;

					}
					?>


					<?php
					if(!isset($_SESSION['customer_email'])){

					echo "<a href='../checkout.php' style='color:orange;'>Login</a>";

					}
					else {
					echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
					}



					?>



					</span>
			</div>

				<div id="products_box">



				<?php
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){

				echo "
				<h2 style='padding:20px;'>Welcome:  $c_name </h2>
				<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b>";
				}
				}
				}
				}
				?>

				<?php
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}


				?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->
		<?php require('../includes/footer.php'); ?>
	</div>
<!--Main Container ends here-->


</body>
</html>
