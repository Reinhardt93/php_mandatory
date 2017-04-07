<?php
include_once('functions/functions.php');
if(!isset($_SESSION['user_email'])){
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {
?>

<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View All Products Here</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

<?php
viewAllProducts()
?>

</table>

<?php } ?>
