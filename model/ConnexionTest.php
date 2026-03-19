<?php
/*
 * ConnexionTest.php
 */
require_once "./Connexion.php";

$cnx = new Connexion();

$pdo = $cnx->seConnecter("../conf/projet.ini");

var_dump($pdo);

$cnx->seDeconnecter($pdo);

var_dump($pdo);
?>