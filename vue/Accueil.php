<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
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

    <h1>Accueil</h1>

    
    <label>
        <?php
        //message de retour qui s'affiche une fois le fromulaire envoyé
        $message = isset($_SESSION['messageAjout']) ? $_SESSION['messageAjout'] : "";
       echo $message;
        unset($_SESSION['messageAjout']);
        ?>
    </label>
    <?php if (!empty($formations)): ?>
        <ul>
            <?php foreach ($formations as $formation): ?>
                <li>
                    <img src="<?= $formation['img_formation'] ?>" alt="Image de la formation">
                    <div class="formation-info">
                        <div class="formation-details">
                            <p class="formation-name"><?= $formation['nom_formation'] ?></p>
                            <p><strong>Prix :</strong> <?= $formation['prix_formation']  ?> $</p>
                            <p><strong>Informations :</strong> <?= $formation['informations_formation'] ?></p>
                            <p><strong>Catégorie :</strong> <?= $formation['categorie_formation'] ?></p>
                            <p><strong>Vendeur :</strong> <?= $formation['pseudo'] ?></p>
                        </div>
                        <form action="../controleur/AjoutPanier.php" method="post">
                            <input type="hidden" name="formation_id" value="<?= $formation['id_formation'] ?>">
                            <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                        </form>
                        <form action="../controleur/Signalement.php" method="post">
                            <input type="hidden" name="formation_id" value="<?= $formation['id_formation'] ?>">
                            <button type="submit" class="signalement-btn">Signaler la formation </button>
                        </form>
                        <form action="../controleur/Avis.php" method="post">
                            <input type="hidden" name="formation_id" value="<?= $formation['id_formation'] ?>">
                            <button type="submit" class="Avis-btn">Avis </button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucune formation trouvée.</p>
    <?php endif; ?>


    <footer>
        <?php include '../vue/Footer.php'; ?>
    </footer>

</body>

</html>
