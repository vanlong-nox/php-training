<form method="post" action="">
	title: <input type="text" name="title" value="<?php echo isset($category['title'])?$category['title']:''; ?>"><br />
	alias: <input type="text" name="alias" value="<?php echo isset($category['alias'])?$category['alias']:''; ?>"><br />
	<input type="submit" name="edit" value="Edit">
</form>