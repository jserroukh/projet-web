<?php

require_once '../model/Connexion.php';
require_once "../model/SignalementModel.php";
require_once "../class/Signalement.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$idFormation = filter_input(INPUT_POST, "id_formation");

$model = new SignalementModel($pdo);


try {

    $affected = $model->deleteId($idFormation);

    if ($affected === -1) {
        $message = "Erreur lors de la supression <br>";
    } else {
        $message = $affected . " formation  retirer des signalement<br>";
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}

include '../controleur/GererSignalement.php';
