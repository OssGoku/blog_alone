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
				if($pseudo === $loginUser && md5($password) === $passwordUser)
				{
					$_SESSION["id"] = $idUser;
					$_SESSION["pseudo"] = $loginUser;

					header("Location: index.php?page=home");
					exit;
				}
				else if($pseudo != $loginUser || md5($password) != $passwordUser)
				{
					$error = "L'identifiant ou le mot de passe est incorrecte...";
				}
			}else{
				$error = "L'identifiant ou le mot de passe est incorrecte...";
			}
		}
	}

?>