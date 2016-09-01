<?php
	$content = "";
	
	if(isset($_POST["title"], $_POST["content"]))
	{
		$title = mysqli_real_escape_string($db, $_POST["title"]);
		$content = mysqli_real_escape_string($db, $_POST["content"]);

		$res = mysqli_query($db, "INSERT INTO posts (`date_post`, `title`, `content`, `id_author`) VALUES (CURRENT_DATE(), '".$title."', '".$content."', '".$_SESSION['id']."')");

		// var_dump(mysqli_error($db));
		if($res == false)
		{
			if (mysqli_errno($db) == 1062){
				$error = "Ce titre existe déjà";
				var_dump($error);
			}
			else{
				$error = 'Internal server error';
				var_dump($error);
			}
		}
		else{
			header("Location: index.php?page=home");
			exit;
		}
	}
?>