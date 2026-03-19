<?php

require_once '../model/Connexion.php';
require_once "../model/FormationModel.php";
require_once "../class/Formation.php";

$cnx = new Connexion;
$pdo = $cnx->seConnecter("../conf/projet.ini");

$insert = filter_input(INPUT_POST, "insert");

if ($insert != null) {

    $nom = filter_input(INPUT_POST, "Nom");
    $prix = filter_input(INPUT_POST, "Prix");
    $informations = filter_input(INPUT_POST, "Informations");
    $categorie = filter_input(INPUT_POST, "Categorie");

    $Img = $_FILES['Img'];
    if ($Img['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../image/';
        $uploadFile = $uploadDir . basename($Img['name']);

        if (move_uploaded_file($Img['tmp_name'], $uploadFile)) {

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $idUtilisateur = $_SESSION['idUtilisateur'];

            $formation = new Formation(0, $nom, $prix, $informations, $uploadFile, $idUtilisateur, $categorie);

            try {
                $dao = new FormationModel($pdo);
                $affected = $dao->insert($formation);

                if ($affected === -1) {
                    $message = "Erreur lors de l'ajout<br>";
                } else {
                    $message = $affected . " formation a bien été ajouté<br>";
                }
            } catch (PDOException $e) {
                $message = $e->getMessage();
            }
        } else {
            $message = "Erreur lors du téléchargement de l'image<br>";
        }
    } else {
        $message = "Une erreur est survenue lors de l'upload de l'image<br>";
    }
}

include '../vue/AjoutFormation.php';
