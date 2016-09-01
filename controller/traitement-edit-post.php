<?php
	// $title= "";
	// $content= "";
	// $idSelect= 1;

	// $req = "SELECT title, content FROM posts WHERE id = '".$idSelect."'";
	var_dump($_POST);
	exit;

	// if(isset($_POST["title"], $_POST["content"])){
	// 	$title = mysqli_real_escape_string($db, $_POST["title"]);
	// 	$content = mysqli_real_escape_string($db, $_POST["content"]);

	// 	if(empty($title) || empty($content)){
	// 		$error = "Merci de compléter tous les champs ...";
	// 	}
	// 	else
	// 	{
	// 		// $id = intval($_GET["id"]);
	// 		$req = "UPDATE posts SET title = '".$title."', goal = '".$objectif."', content = '".$textBox."' WHERE id = ".$id."";
	// 		$thisDb = mysqli_query($db, $req);

	// 		if($res == false)
	// 		{
	// 			if (mysqli_errno($db) == 1062)
	// 				$error = "Ce titre existe déjà";

	// 			else
	// 				$error = 'Internal server error';
	// 		}
	// 		header("Location: index.php?page=single&id=".$id."");
	// 		exit;
	// 	}
	
	// }
?>