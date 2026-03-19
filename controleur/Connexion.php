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

    $utilisateur = new Utilisateur(0, $pseudo, $mdp);


    try {

        $model = new UtilisateurModel($pdo);

        $id = $model->selectId($utilisateur);
        $type = $model->selectType($utilisateur);

        $mdpBd = $model->selectMDPWherePseudo($utilisateur); // recup le mot de passe haché de la bd

        // Vérifier si le mot de passe correspond au mot de passe haché
        if (password_verify($mdp, $mdpBd)) {
            $message =  " utilisateur connecté<br>";

            session_start();
            //création de variables session (conservé pour toutes les pages) permettant de savoir si l'utilisateur est connecté et connaitre son type et son id
            $_SESSION['idUtilisateur'] = $id;
            $_SESSION['type'] = $type;
        } else {
            $message = "Mdp incorecte";
        }
        
    } catch (PDOException $e) {
        $message = $e->getMessage();
    }
}

include '../vue/Connexion.php';
