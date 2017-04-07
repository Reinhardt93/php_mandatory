<?php
include_once('functions/functions.php');
?>

<table width="795" align="center" bgcolor="pink">


	<tr align="center">
		<td colspan="6"><h2>View all payments here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Customer Email</th>
		<th>Product (S)</th>
		<th>Paid Amount</th>
		<th>Transaction ID</th>
		<th>Payment Date</th>
	</tr>

	<?php
	viewAllPayments();
	?>
</table>
