<?php

require_once '../model/Connexion.php';
require_once "../model/PanierModel.php";
require_once "../class/Panier.php";
require_once "../class/Commande.php";
require_once "../model/CommandeModel.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$model = new CommandeModel($pdo);
$modelPanier = new PanierModel($pdo);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$idFormations = $modelPanier->getFormationIdPanier($_SESSION['idUtilisateur']);
$date_commande = date("Y-m-d H:i:s");



foreach($idFormations as $idFormation):

$commande = new Commande(0,$_SESSION['idUtilisateur'],$date_commande,$idFormation['id_formation']);

try {
    $affected = $model->insert($commande);

    if ($affected === -1) {
        $message = "Erreur lors de l'ajout<br>";
    } else {
        // $OK = $tx->valider($pdo);
        $message =" Votre panier a bien été acheté <br>";
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}

endforeach;

$modelPanier->deleteAll($_SESSION['idUtilisateur']);


include '../controleur/Panier.php';
