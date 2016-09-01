<?php
	var_dump($_POST);

 //    $poss = "blablalblalabla";
	// $options = ['cost' => 11,];
 //    $fish = password_hash($poss, PASSWORD_BCRYPT);
 //    echo $fish;

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
				// $options = ['cost' => 11,];
			    $passwordFished = password_hash($password1, PASSWORD_BCRYPT);
				$req = "INSERT INTO users (pseudo, mail, password) VALUES ('".$pseudo."', '".$mail."', '".$passwordFished."')";
				$res = mysqli_query($db, $req);
				
				header("Location: index.php?page=login");
				exit;
			}
		}
	}
?>