<?php


require_once '../model/Connexion.php';
require_once '../class/Commentaire.php';
require_once '../model/CommentaireModel.php';


$cnx = new Connexion;
$pdo = $cnx->seConnecter("../conf/projet.ini");


$formationId = filter_input(INPUT_POST, "formation_id");
$TetxeCommentaire = filter_input(INPUT_POST, "Commentaire");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['type'])) {
    if ($formationId != null) {

        $commentaire = new Commentaire(0, $TetxeCommentaire, $formationId, $_SESSION['idUtilisateur']);

        $model = new CommentaireModel($pdo);
        try {
            $affected = $model->insert($commentaire);

            if ($affected === -1) {
                $message = "Erreur lors de l'ajout du commentaire<br>";
            } else {
                $message = $affected . " commentaire à bien été posté <br>";
            }
        } catch (PDOException $e) {
            $message = $e->getMessage();
        }
    }
} else {
    $message = " Il faut se connecter pour pouvoir laisser des avis<br>";
}
include '../controleur/Avis.php';
