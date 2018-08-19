<?php
if (isset($category) && count($category)) {
	foreach ($category as $key => $value) {
		echo $key+1 . ' '. $value['title'].' - <a href="edit/'.$value['id'].'">edit</a> - <a href="delete/'.$value['id'].'">delete</a><br />';
	}
}
echo '<br />';
echo '<a href="add">Add</a>';
?>