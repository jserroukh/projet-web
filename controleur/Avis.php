<?php

require_once '../model/Connexion.php';
require_once "../model/CommentaireModel.php";
require_once "../class/Commentaire.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$model = new CommentaireModel($pdo);

$formationId = filter_input(INPUT_POST, "formation_id");

$commentaires = $model->getCommentaireFormations($formationId);

include '../vue/Avis.php';
