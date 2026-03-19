<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
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
    <div class="container">
        <h1>Historique des achats</h1>
        <table>
            <tr>
                <th>Numéro de Commande</th>
                <th>Date de commande</th>
                <th>Cout de l'achat</th>
                <th>nom de la formation acheté</th>
            </tr>
            <?php foreach ($commandes as $commande): ?>
                <tr>
                    <td><?= $commande['id_commande'] ?></td>
                    <td><?= $commande['date_commande'] ?></td>
                    <td><?= $commande['prix_formation'] ?>$</td>
                    <td><?= $commande['nom_formation'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <footer>
        <?php include '../vue/Footer.php'; ?>
    </footer>
</body>
</html>
