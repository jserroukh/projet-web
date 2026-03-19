<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Panier</title>
    <link rel="icon" type="image/png" href="../image/Icone.png">
    <link rel="stylesheet" type="text/css" href="../css/General.css">
    <link rel="stylesheet" type="text/css" href="../css/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/navBar.css">
    <link rel="stylesheet" href="../css/Profile.css">
</head>

</p>
<?php include '../vue/NavBar.php';
?>

<body>

    <h1>Panier</h1>

    <table>
        <tr>
            <th>Formation</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
        <?php foreach ($panier as $article) : ?>
            <tr>
                <td><?= $article['nom_formation'] ?></td>
                <td><?= $article['prix_formation'] ?></td>
                <td>
                    <form action="SupprimerPanier.php" method="post">
                        <input type="hidden" name="formation_id" value="<?= $article['id_formation'] ?>">
                        <button type="submit">Supprimer du panier</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="ValidePanier.php" method="post">
        <button type="submit">Valider le panier</button>
    </form>

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