<?php 

require_once '../model/Connexion.php';
require_once '../class/Panier.php';
require_once '../model/PanierModel.php';

$cnx = new Connexion;
$pdo = $cnx->seConnecter("../conf/projet.ini");

$formationId = filter_input(INPUT_POST, "formation_id");

if ($formationId != null) {
   
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $panier = new Panier(0, $_SESSION['idUtilisateur'], $formationId,);

    
    try {

        $model = new PanierModel($pdo);
        $affected = $model->delete($panier);

        if ($affected === -1) {
            $message = "Erreur lors de la supression au panier<br>";
        } else {
            $message = $affected . " formation à été supprimé du panier <br>";
        }
    } catch (PDOException $e) {
        $message = $e->getMessage();
    }

}
include '../Controleur/Panier.php';