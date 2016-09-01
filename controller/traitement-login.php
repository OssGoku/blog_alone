<?php

	if(isset($_POST["pseudo"], $_POST["pass"]))
	{
		$pseudo = mysqli_real_escape_string($db, $_POST["pseudo"]);
		$password = mysqli_real_escape_string($db, $_POST["pass"]);
		// var_dump($_POST);

		if(empty($pseudo) || empty($password))
		{
			$error = "Veuillez compléter tous les champs...";
		}
		else
		{
			$req = "SELECT * FROM users WHERE pseudo = '".$pseudo."'";
			$res = mysqli_query($db, $req);

			while($userTab = mysqli_fetch_assoc($res))
			{	
				$idUser = $userTab['id'];
				$loginUser = $userTab['pseudo'];
				$passwordUser = $userTab['password'];
			}

			if(isset($idUser, $loginUser, $passwordUser))
			{
				if($pseudo === $loginUser && password_verify($password, $passwordUser))
				{
					$_SESSION["id"] = $idUser;
					$_SESSION["pseudo"] = $loginUser;

					header("Location: index.php?page=home");
					exit;
				}
				else if($pseudo != $loginUser || $password != $passwordUser)
				{
					$error = "Mot de passe incorrecte";
					echo $error;
				}
			}else{
				$error = "Identifiant incorrecte";
				echo $error;
			}
		}
	}

?>