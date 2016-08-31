<?php
	var_dump($_POST);

	if(isset($_POST["subscribe"])){

		$pseudo = mysqli_real_escape_string($db, $_POST["pseudo"]);
		$mail = mysqli_real_escape_string($db, $_POST["mail"]);
		$password1 = mysqli_real_escape_string($db, $_POST["pass1"]);
		$password2 = mysqli_real_escape_string($db, $_POST["pass2"]);
		
		if(empty($pseudo) || empty($mail) || empty($password1) || empty($password2))
		{
			$error = "Merci de compléter tous les champs...";
		}
		else
		{
			$req = "SELECT mail FROM users WHERE mail='".$mail."'";
			$mails = mysqli_query($db, $req);

			$mailTab = mysqli_fetch_assoc($mails);
			if($mailTab)
			{
				$error = "Cette adresse email est déjà utilisée.";
			}

			if($password1 != $password2)
			{
				$error = "Merci de saisir des mots de passe identiques";
			}
			else
			{
				$req = "INSERT INTO users (pseudo, mail, password) VALUES ('".$pseudo."', '".$mail."', '".md5($password1)."')";
				$res = mysqli_query($db, $req);
				
				header("Location: index.php?page=login");
				exit;
			}
		}
	}
?>