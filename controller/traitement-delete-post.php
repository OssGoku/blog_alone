<?php
// var_dump($_POST);

	$res = mysqli_query($db, "DELETE FROM posts WHERE id_post = '".$_POST['id']."'");
	var_dump(mysqli_error($db));

	header("Location: index.php?page=home");
	exit;
	
?>