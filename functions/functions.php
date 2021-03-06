<?php
// After uploading to online server, change this connection accordingly
require('./includes/db.php');

if (mysqli_connect_errno())
  {
  echo "The Connection was not established: " . mysqli_connect_error();
  }
 // getting the user IP address
  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}



//creating the shopping cart
function cart(){

if(isset($_GET['add_cart'])){

	global $con;

	$ip = getIp();

	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

	$run_check = mysqli_query($con, $check_pro);

	if(mysqli_num_rows($run_check)>0){

	echo "";

	}
	else {

	$insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";

	$run_pro = mysqli_query($con, $insert_pro);

	echo "<script>window.open('index.php','_self')</script>";
	}

}

}
 // getting the total added items

 function total_items(){

	if(isset($_GET['add_cart'])){

		global $con;

		$ip = getIp();

		$get_items = "select * from cart where ip_add='$ip'";

		$run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);

		}

		else {

		global $con;

		$ip = getIp();

		$get_items = "select * from cart where ip_add='$ip'";

		$run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);

		}

	echo $count_items;
	}

// Getting the total price of the items in the cart

	function total_price(){

		$total = 0;

		global $con;

		$ip = getIp();

		$sel_price = "select * from cart where ip_add='$ip'";

		$run_price = mysqli_query($con, $sel_price);

		while($p_price=mysqli_fetch_array($run_price)){

			$pro_id = $p_price['p_id'];

			$pro_price = "select * from products where product_id='$pro_id'";

			$run_pro_price = mysqli_query($con,$pro_price);

			while ($pp_price = mysqli_fetch_array($run_pro_price)){

			$product_price = array($pp_price['product_price']);

			$values = array_sum($product_price);

			$total +=$values;

			}


		}

		echo "$" . $total;


	}

//getting the categories

function getCats(){

  global $pdo;

  $stmt = $pdo->query('SELECT * FROM categories');
  while($row_cats = $stmt->fetch())
  {
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];

    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
  }

}



//getting the brands

function getBrands(){

  global $pdo;

  $stmt = $pdo->query('SELECT * FROM brands');
  while($row_brand = $stmt->fetch())
  {
    $brand_id = $row_brand['brand_id'];
    $brand_title = $row_brand['brand_title'];

    echo "<li><a href='index.php?cat=$brand_id'>$brand_title</a></li>";
  }

}

function getPro(){

  global $pdo;

  $stmt = $pdo->query('SELECT * FROM products ORDER BY RAND() LIMIT 0,6');
  while($row_pro = $stmt->fetch())
  {
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
             <p><b> Price: $ $pro_price </b></p>
             <a href='details.php?pro_id=$pro_id' id='singleprod'>Details</a>
             <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
           </div>
       ";
  }
}


function getCatPro(){

  global $pdo;

  if(isset($_GET['cat'])){

    $cat_id = $_GET['cat'];

  $stmt = $pdo->prepare('SELECT * FROM products WHERE product_cat = ?');
  $stmt->execute([$cat_id]);
  while($row_cat_pro = $stmt->fetch())
  {
      $pro_id = $row_cat_pro['product_id'];
      $pro_cat = $row_cat_pro['product_cat'];
      $pro_brand = $row_cat_pro['product_brand'];
      $pro_title = $row_cat_pro['product_title'];
      $pro_price = $row_cat_pro['product_price'];
      $pro_image = $row_cat_pro['product_image'];

      echo "
        <div id='single_product'>
          <h3>$pro_title</h3>
          <img src='admin_area/product_images/$pro_image' width='180' height='180' />
          <p><b> $ $pro_price </b></p>
          <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
          <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
        </div>
        ";
  }

  }
}


function getBrandPro(){

  global $pdo;

  $stmt = $pdo->prepare('SELECT * FROM products WHERE product_brand = ?');
  $stmt->execute(['brand']);
  while($row_brand_pro = $stmt->fetch())
  {

		$pro_id = $row_brand_pro['product_id'];
		$pro_cat = $row_brand_pro['product_cat'];
		$pro_brand = $row_brand_pro['product_brand'];
		$pro_title = $row_brand_pro['product_title'];
		$pro_price = $row_brand_pro['product_price'];
		$pro_image = $row_brand_pro['product_image'];

		echo "
				<div id='single_product'>
					<h3>$pro_title</h3>
					<img src='admin_area/product_images/$pro_image' width='180' height='180' />
					<p><b> $ $pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				</div>
		";
	}

}


?>
