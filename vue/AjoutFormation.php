<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajout Formation</title>
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

    <h1>Ajout Formation</h1>

    <form action="../controleur/AjoutFormation.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="Nom"> Nom de la formation : </label>
            <input type="texte" name="Nom" required/>
        </p>

        <p>
            <label for="Prix"> Prix de la formation : </label>
            <input type="number" name="Prix" step="0.01" min="0.01" required />
        </p>

        <p>
            <label for="Informations"> Informations sur la formation : </label>
            <textarea name="Informations" rows="4" cols="50" required></textarea>
        </p>

        <p>
            <label for="Img"> Image de la formation : </label>
            <input type="file" name="Img" accept="image/*">
        </p>

        <p>
            <label for="Categorie"> Catégorie de la formation : </label>
            <select name="Categorie" required>
                <option value="Sport">Sport</option>
                <option value="business">business</option>
                <option value="Etude">Etude</option>
                <option value="Social">Social</option>
            </select>
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
