<?php

require_once '../model/Connexion.php';
require_once "../model/FormationModel.php";
require_once "../class/Formation.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$formationId = filter_input(INPUT_POST, "formation_id");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['type'])) {

    $model = new FormationModel($pdo);

    $formations = $model->getFormationById($pdo,$formationId);

    include '../vue/Signalement.php';
} else {
    $message = " Il faut se connecter pour pouvoir faire des signalements<br>";
    include '../controleur/Accueil.php';
}





