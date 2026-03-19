<?php

require_once '../model/Connexion.php';
require_once "../class/Commande.php";
require_once "../model/CommandeModel.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

$modelCommande = new CommandeModel($pdo);


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Récupérer les commandes de l'utilisateur à partir du modèle
$commandes = $modelCommande->getCommandesUtilisateur($_SESSION['idUtilisateur']);


include "../vue/Profile.php";