<?php

require_once '../model/FormationModel.php';
require_once "../class/Formation.php";
require_once "../model/Connexion.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$model = new FormationModel($pdo);

$recherche = filter_input(INPUT_POST, "recherche");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($recherche != null) {
    $formations = $model->getAllFormationsLike($recherche);
    $_SESSION['formations'] = $formations;
    
}
include '../vue/Recherche.php';


