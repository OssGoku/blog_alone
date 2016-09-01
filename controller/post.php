<?php
var_dump($_POST);
	$req = "SELECT id_post, title, content FROM posts";
	$res = mysqli_query($db, $req);

	while($blocArticle = mysqli_fetch_assoc($res)){	
		$id_post = $blocArticle["id_post"];
		$title = $blocArticle["title"];
		$content = substr($blocArticle["content"], 0, 80)."...";

		if(empty($_SESSION["pseudo"]))
		{
			require("view/post.phtml");
		}
		else
		{
			require("view/post-in.phtml");
		}
	}
?>