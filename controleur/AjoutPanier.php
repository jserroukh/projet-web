<?php

require_once '../model/Connexion.php';
require_once '../class/Panier.php';
require_once '../model/PanierModel.php';

$cnx = new Connexion;
$pdo = $cnx->seConnecter("../conf/projet.ini");


$formationId = filter_input(INPUT_POST, "formation_id");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['type'])) {
    if ($formationId != null) {

        $panier = new Panier(0, $_SESSION['idUtilisateur'], $formationId,);

        $model = new PanierModel($pdo);
        $test = $model->getPanierFormation($panier);
        if ($test > 0) {
            $message = "Cette formation a déja été ajouter a votre panier<br>";
        } else if ($test === -1) {
            $message = "Erreur lors de l'ajout au panier<br>";
        } else {

            try {
                $affected = $model->insert($panier);

                if ($affected === -1) {
                    $message = "Erreur lors de l'ajout au panier<br>";
                } else {
                    $message = $affected . " formation à été ajouté au panier <br>";
                }
            } catch (PDOException $e) {
                $message = $e->getMessage();
            }
        }
    }
} else {
    $message = " Il faut se connecter pour pouvoir faire des achats<br>";
}
$_SESSION['messageAjout'] = $message;

$last_page_visited = $_SERVER['HTTP_REFERER'];
header("Location: $last_page_visited");
exit();
