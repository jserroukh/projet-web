<?php

require_once '../model/Connexion.php';
require_once "../model/UtilisateurModel.php";
require_once "../class/Utilisateur.php";


$cnx = new Connexion;

$pdo = $cnx->seConnecter("../conf/projet.ini");

/*
    récuperation des saisies de l'utilisateur faites via un formulaire
*/
$insert = filter_input(INPUT_GET, "insert");
//verification de si le formulaire a été remplie 

if ($insert != null) {

    $pseudo = filter_input(INPUT_GET, "Pseudo");
    $mdp = filter_input(INPUT_GET, "mdp");
    $type = filter_input(INPUT_GET, "Type");
    $mdpAdmin = filter_input(INPUT_GET, "mdpAdmin");

    if (strlen($pseudo < 3)) {
        $message = "Le psuedo doit contennir au moins trois caractère";
    } else if (strlen($mdp < 3)) {
        $message = "Le mdp doit contennir au moins trois caractère";
    } else {
        if ($type == "Admin" && $mdpAdmin !== "CodeSecret") {
            $message = "Ne tente pas de t'inscrire en tant qu'Admin si tu m'en est pas un";
        } else {

            // Hacher le mot de passe
            $mot_de_passe_hache = password_hash($mdp, PASSWORD_DEFAULT);

            // Créer l'objet Utilisateur avec le mot de passe haché
            $utilisateur = new Utilisateur(0, $pseudo, $mot_de_passe_hache, $type);

            $model = new UtilisateurModel($pdo);

            $affected = $model->selectWherePseudo($utilisateur);
            if ($affected >= 1) {
                $message = "Ce pseudo est deja utilisé";
            } else {
                try {
                    $affected = $model->insert($utilisateur);

                    if ($affected === -1) {
                        $message = "Erreur lors de l'ajout<br>";
                    } else {
                        // $OK = $tx->valider($pdo);
                        $message = $affected . " utilisateur ajouté<br>";
                    }
                } catch (PDOException $e) {
                    $message = $e->getMessage();
                }
            }
        }
    }
}
include '../vue/Inscription.php';
