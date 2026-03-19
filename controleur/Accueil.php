<?php

require_once '../model/Connexion.php';
require_once "../model/FormationModel.php";
require_once "../class/Formation.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$model = new FormationModel($pdo);

$formations = $model->getAllFormations($pdo);

include '../vue/Accueil.php';