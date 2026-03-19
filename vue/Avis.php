<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Avis</title>
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

    <h1>Avis</h1>



    <?php if (!empty($commentaires)) : ?>
        <ul>
            <?php foreach ($commentaires as $commentaire) : ?>
                <li>
                    <div class="commentaire">
                        <div class="formation-details">
                            <p><strong>Pseudo :</strong><?= $commentaire['pseudo'] ?></p>
                            <p><strong>Commentaire :</strong> <?= $commentaire['texte_commentaire']  ?> </p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>

        </ul>
    <?php else : ?>
        <p>Aucune avis trouvée.</p>
    <?php endif; ?>
    <form action="../controleur/AjoutAvis.php" method="post">
        <input type="hidden" name="formation_id" value="<?= $formationId ?>">
        <button type="submit" class="Avis-btn">Ajouter un avis </button>
    </form></br>


    <footer>
        <?php include '../vue/Footer.php'; ?>
    </footer>

</body>

</html>