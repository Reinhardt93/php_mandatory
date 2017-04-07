<?php
session_start();
include("functions/functions.php");
include("includes/db.php");
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

		<!--Navigation Bar starts-->


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

			<?php cart(); ?>



				<form action="customer_register.php" method="post" enctype="multipart/form-data" style="margin-left:172px;margin-top:100px;">

					<table align="center" width="750">

						<tr align="center">
							<td colspan="6"><h2>Create an Account</h2></td>
						</tr>

						<tr>
							<td align="right">Customer Name:</td>
							<td><input type="text" name="c_name" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Email:</td>
							<td><input type="text" name="c_email" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Password:</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Image:</td>
							<td><input type="file" name="c_image" required/></td>
						</tr>



						<tr>
							<td align="right">Customer Country:</td>
							<td>
							<SELECT name="c_country">
								<option>SELECT a Country</option>
								<option>Denmark</option>
								<option>Not Denmark</option>
							</SELECT>

							</td>
						</tr>

						<tr>
							<td align="right">Customer City:</td>
							<td><input type="text" name="c_city" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Contact:</td>
							<td><input type="text" name="c_contact" required/></td>
						</tr>

						<tr>
							<td align="right">Customer Address</td>
							<td><input type="text" name="c_address" required/></td>
						</tr>


					<tr align="center">
						<td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
					</tr>



					</table>

				</form>

			</div>
		</div>
		<!--Content wrapper ends-->
		<?php require('includes/footer.php'); ?>
	</div>
<!--Main Container ends here-->


</body>
</html>
<?php
	if(isset($_POST['register'])){


		$ip = getIp();

		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];


		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

		 $insert_c = "insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";

		$run_c = mysqli_query($con, $insert_c);

		$sel_cart = "SELECT * from cart where ip_add='$ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart==0){

		$_SESSION['customer_email']=$c_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";

		}
		else {

		$_SESSION['customer_email']=$c_email;

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";

		echo "<script>window.open('checkout.php','_self')</script>";


		}
	}





?>
