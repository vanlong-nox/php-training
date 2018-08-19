<table>
	<tr>
		<th>ID</th>
		<th>TITLE</th>
	</tr>
<?php
	if(isset($category) && count($category)) {
		foreach ($category as $key => $value) {
			?>
			<tr>
				<td><?php echo $value['id']; ?></td>
				<td><?php echo $value['title']; ?></td>
			</tr>
			<?php
		}
	}
?>
</table>