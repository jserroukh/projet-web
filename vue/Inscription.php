<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="icon" type="image/png" href="../image/Icone.png">
	<link rel="stylesheet" type="text/css" href="../css/General.css">
	<link rel="stylesheet" type="text/css" href="../css/Footer.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="../css/navBar.css">
</head>
</p>
	<?php include '../vue/NavBar.php';
?>
<body>
	<h1>Inscription</h1>

	<form action="../controleur/Inscription.php" method="get" >
		<p>
			<label for="Pseudo"> Pseudo : </label>
			<input type="texte" name="Pseudo" />
		</p>

		<p>
			<label for="mdp"> Mot de passe : </label>
			<input type="texte" name="mdp" />
		</p>

		<p>
			<label for="Type"> Type d'utilisateur : </label>
			<select name="Type">
				<option value="Utilisateur">Utilisateur</option>
				<option value="Vendeur">Vendeur</option>
				<option value="Admin">Admin</option>
			</select>
		</p>

		<p>
			<label for="mdpAdmin"> Mot de passe pour utilisateurs admin : </label>
			<input type="texte" name="mdpAdmin">
		</p>

		<p>
			<input type="reset" name="">
			<input type="submit" name="">
			<input type="hidden" name="insert" value='insert' /><br>
		</p>
	</form>

	<label>
		<?php
		//message de retour qui s'affiche une fois le fromulaire envoyer
		if (isset($message)) {
			echo $message;
		}
		?>
	</label>

	<p>
		<a href="../controleur/Connexion.php"> Connexion </a> &nbsp;
		<a href="PageAccueil.html"> Retour a la page d'accueil </a>
	</p>
	<footer><?php include '../vue/Footer.php';
	?>
</footer>

</body>

</html>