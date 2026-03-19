<?php

require_once '../model/Connexion.php';
require_once "../model/SignalementModel.php";
require_once "../class/Signalement.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");


$model = new SignalementModel($pdo);

$formations = $model->getFormationsSignalees();


include '../vue/GererSignalement.php';
