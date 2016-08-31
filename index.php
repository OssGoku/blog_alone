<?php
	session_start();
	$db = mysqli_connect("localhost", "root", "troiswa", "blog_alone");
	$error = "";
	$error404 = "";
	$page = "login";

	$access = ["home", "register", "login", "single", "register"];
	$accessAdmin = ["home", "register", "login", "create-post", "edit-post", "single", "404"];
	if(isset($_SESSION["pseudo"]))
	{
		if(isset($_GET["page"]) && in_array($_GET["page"], $accessAdmin))
		{
			$page = $_GET["page"];
		}	
	}
	else
	{
		if(isset($_GET["page"]) && in_array($_GET["page"], $access))
		{
			$page = $_GET["page"];
		}	
	}

	$traitementList = ["register", "login", "logout", "create-post", "edit-post","delete-post", "create-comment", "delete-comment"];
	if(in_array($page, $traitementList))
	{
		require("controller/traitement-".$page.".php");
	}
	require("controller/skel.php");
?>