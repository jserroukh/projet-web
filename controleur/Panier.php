<?php
require_once '../model/Connexion.php';
require_once '../model/PanierModel.php';

// Vérifie si la session a déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['idUtilisateur'])) {
    header("Location: connexion.php");
    exit();
}

// Récupère la connexion à la base de données
$cnx = new Connexion;
$pdo = $cnx->seConnecter("../conf/projet.ini");

// Instancie le modèle de panier
$panierModel = new PanierModel($pdo);

// Récupère tous les articles du panier de l'utilisateur
$panier = $panierModel->getAllFormationsPanier($_SESSION['idUtilisateur']);

// Charge la vue du panier
include '../vue/Panier.php';
?>
