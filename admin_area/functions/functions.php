<?php
include("../includes/db.php");


function viewAllProducts(){
  global $con;

$get_pro = "SELECT * from products";

$run_pro = mysqli_query($con, $get_pro);

$i = 0;

while ($row_pro=mysqli_fetch_array($run_pro)){

  $pro_id = $row_pro['product_id'];
  $pro_title = $row_pro['product_title'];
  $pro_image = $row_pro['product_image'];
  $pro_price = $row_pro['product_price'];
  $i++;

?>
<tr align="center">
  <td><?php echo $i;?></td>
  <td><?php echo $pro_title;?></td>
  <td><img src="product_images/<?php echo $pro_image;?>" width="60" height="60"/></td>
  <td><?php echo $pro_price;?></td>
  <td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
  <td><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>

</tr>
<?php } }


function viewAllPayments(){

  global $con;

  $get_payment = "SELECT * from payments";

	$run_payment = mysqli_query($con, $get_payment);

	$i = 0;

	while ($row_payment=mysqli_fetch_array($run_payment)){

		$amount = $row_payment['amount'];
		$trx_id = $row_payment['trx_id'];
		$payment_date = $row_payment['payment_date'];
		$pro_id = $row_payment['product_id'];
		$c_id = $row_c['customer_id'];

		$i++;

		$get_pro = "SELECT * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro);

		$row_pro=mysqli_fetch_array($run_pro);

		$pro_image = $row_pro['product_image'];
		$pro_title = $row_pro['product_title'];

		$get_c = "SELECT * from customers where customer_id='$c_id'";
		$run_c = mysqli_query($con, $get_c);

		$row_c=mysqli_fetch_array($run_c);

		$c_email = $row_c['customer_email'];

	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $c_email; ?></td>
		<td>
		<?php echo $pro_title;?><br>
		<img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
		</td>
		<td><?php echo $amount;?></td>
		<td><?php echo $trx_id;?></td>
		<td><?php echo $payment_date;?></td>

	</tr>
	<?php }
}


function viewAllOrders(){

  global $con;

  $get_order = "SELECT * from orders";

  $run_order = mysqli_query($con, $get_order);

  $i = 0;

  while ($row_order=mysqli_fetch_array($run_order)){

    $order_id = $row_order['order_id'];
    $qty = $row_order['qty'];
    $pro_id = $row_order['p_id'];
    $c_id = $row_order['c_id'];
    $invoice_no = $row_order['invoice_no'];
    $order_date = $row_order['order_date'];
    $i++;

    $get_pro = "SELECT * from products where product_id='$pro_id'";
    $run_pro = mysqli_query($con, $get_pro);

    $row_pro=mysqli_fetch_array($run_pro);

    $pro_image = $row_pro['product_image'];
    $pro_title = $row_pro['product_title'];

    $get_c = "SELECT * from customers where customer_id='$c_id'";
    $run_c = mysqli_query($con, $get_c);

    $row_c=mysqli_fetch_array($run_c);

    $c_email = $row_c['customer_email'];

  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $c_email; ?></td>
    <td>
    <?php echo $pro_title;?><br>
    <img src="../admin_area/product_images/<?php echo $pro_image;?>" width="50" height="50" />
    </td>
    <td><?php echo $qty;?></td>
    <td><?php echo $invoice_no;?></td>
    <td><?php echo $order_date;?></td>
    <td><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete Order</a></td>

  </tr>
  <?php }
}

function viewAllCustomers(){

  global $con;

  $get_c = "SELECT * from customers";

  $run_c = mysqli_query($con, $get_c);

  $i = 0;

  while ($row_c=mysqli_fetch_array($run_c)){

    $c_id = $row_c['customer_id'];
    $c_name = $row_c['customer_name'];
    $c_email = $row_c['customer_email'];
    $c_image = $row_c['customer_image'];
    $i++;

  ?>
  <tr align="center">
    <td><?php echo $i;?></td>
    <td><?php echo $c_name;?></td>
    <td><?php echo $c_email;?></td>
    <td><img src="../customer/customer_images/<?php echo $c_image;?>" width="50" height="50"/></td>
    <td><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Delete</a></td>

  </tr>
  <?php }
}


function viewAllCategories(){

  global $con;

  $get_cat = "SELECT * from categories";

	$run_cat = mysqli_query($con, $get_cat);

	$i = 0;

	while ($row_cat=mysqli_fetch_array($run_cat)){

		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		$i++;

	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $cat_title;?></td>
		<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>

	</tr>
	<?php }
}

function viewAllBrands(){

  global $con;

  $get_brand = "SELECT * FROM brands";
	$run_brand = mysqli_query($con, $get_brand);

	$i = 0;
	while ($row_brand=mysqli_fetch_array($run_brand)){
		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		$i++;
	?>

	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $brand_title;?></td>
		<td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
		<td><a href="delete_brand.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
	</tr>

	<?php }
}


?>
