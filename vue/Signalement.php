<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Siganlement</title>
    <link rel="icon" type="image/png" href="../image/Icone.png">
    <link rel="stylesheet" type="text/css" href="../css/General.css">
    <link rel="stylesheet" type="text/css" href="../css/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/FormationAffichage.css">
</head>

</p>
	<?php include '../vue/NavBar.php';
?>

<body>

    <h1>Signaler une formations</h1>

    <?php if (!empty($formations)): ?>
        <ul>
            <?php foreach ($formations as $formation): ?>
                <li>
                    <img src="<?= $formation['img_formation'] ?>" alt="Image de la formation">
                    <div class="formation-info">
                        <div class="formation-details">
                            <p class="formation-name"><?= $formation['nom_formation'] ?></p>
                            <p><strong>Prix :</strong> <?= $formation['prix_formation'] ?></p>
                            <p><strong>Informations :</strong> <?= $formation['informations_formation'] ?></p>
                            <p><strong>Catégorie :</strong> <?= $formation['categorie_formation'] ?></p>
                            
                        </div>
                        <form action="../controleur/SignalementConfirmer.php" method="post">
                            <label for="Raison"> Pourquoi signaler cette formation : </label>
                            <textarea name="Raison" rows="4" cols="85"></textarea>
                            <input type="hidden" name="formation_id" value="<?= $formation['id_formation'] ?>">
                            <button type="submit" class="signalement-btn">Signaler la formation </button>
                        </form>
                        <form action="Accueil.php" method="post">
                            <button type="submit" class="add-to-cart-btn">Annuler </button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune formation trouvée.</p>
    <?php endif; ?>

    <label>
        <?php
        //message de retour qui s'affiche une fois le fromulaire envoyé
        if (isset($message)) {
            echo $message;
        }
        ?>
    </label>

    <footer>
        <?php include '../vue/Footer.php'; ?>
    </footer>

</body>

</html>
