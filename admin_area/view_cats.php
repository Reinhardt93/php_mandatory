<?php
include_once('functions/functions.php');
?>
<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View All Categories Here</h2></td>
	</tr>

	<tr align="center" bgcolor="skyblue">
		<th>Category ID</th>
		<th>Category Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php
	viewAllCategories();
	?>
</table>
