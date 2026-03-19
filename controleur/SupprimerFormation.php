<?php

require_once '../model/Connexion.php';
require_once "../model/SignalementModel.php";
require_once "../class/Signalement.php";
require_once "../model/FormationModel.php";
require_once "../class/Formation.php";
require_once "../model/CommandeModel.php";
require_once "../class/Commande.php";
require_once "../model/PanierModel.php";
require_once "../class/Panier.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$idFormation = filter_input(INPUT_POST, "id_formation");


$SignalementModel = new SignalementModel($pdo);
$FormationModel = new FormationModel($pdo);
$commandeModel = new CommandeModel($pdo);
$panierModel = new PanierModel($pdo);

try {
    $commandeModel->deleteId($idFormation);
    $panierModel->deleteId($idFormation);
    $affected1 = $SignalementModel->deleteId($idFormation);
    $affected2 = $FormationModel->deleteId($idFormation);

    if ($affected1 === -1 || $affected2 === -1) {
        $message = "Erreur lors de la supression <br>";
    } else {
        $message = $affected1 . " signalement traité, 1 formation suprimée<br>";
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}

include '../controleur/GererSignalement.php';
