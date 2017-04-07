<?php
include_once('functions/functions.php');
?>
<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View All Customers Here</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Image</th>
		<th>Delete</th>
	</tr>

	<?php
	viewAllCustomers();
	?>

</table>
