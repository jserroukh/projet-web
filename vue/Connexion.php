<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
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

	<h1>Connexion</h1>
	
	<form action="../controleur/Connexion.php" method="get">
		<p>
			<label for = "Pseudo"> Pseudo : </label>	
			<input type="texte" name="Pseudo"/>
		</p>

		<p>
			<label for = "mdp"> Mot de passe : </label>	
			<input type="texte" name="mdp"/>
		</p>

		<p>
			<input type="reset" name="">
			<input type="submit" name="">
			<input type="hidden" name="insert" value='insert' /><br>
		</p>
	</form>

	<label>
		<?php
		//message de retour qui s'affiche une fois le fromulaire envoyé
		if (isset($message)) {
			echo $message;
		}
		?>
	</label>

	<p>
		<a href="../controleur/Inscription.php"> Inscription </a> &nbsp;
		<a href="PageAceuil.html"> Retour a la page d'aceuil </a>
	</p>

	<footer><?php include '../vue/Footer.php';
	?>

</body>
</html>