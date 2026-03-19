<?php 

require_once '../model/Connexion.php';
require_once '../class/Signalement.php';
require_once '../model/SignalementModel.php';

$cnx = new Connexion;
$pdo = $cnx->seConnecter("../conf/projet.ini");


$formationId = filter_input(INPUT_POST, "formation_id");
$Raison = filter_input(INPUT_POST, "Raison");

$signalement = new Signalement(0,$Raison,$formationId);

$model = new SignalementModel($pdo);

try {

    $affected = $model->insert($signalement);

    if ($affected === -1) {
        $message = "Erreur lors du signalement <br>";
    } else {
        $message = $affected . " formation signaler<br>";
    }
} catch (PDOException $e) {
    $message = $e->getMessage();
}

include '../controleur/Accueil.php';
