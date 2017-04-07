<?php
include_once('functions/functions.php');
?>
<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View all orders here</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Product (S)</th>
		<th>Quantity</th>
		<th>Invoice No</th>
		<th>Order Date</th>
		<th>Action</th>
	</tr>

	<?php
	viewAllOrders();
	?>

</table>
