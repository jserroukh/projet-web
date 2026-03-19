<?php

// On charge le fichier
require_once '../class/Signalement.php';

// Déclaration de la classe
class SignalementModel
{
    // On déclare un attribut
    private PDO $pdo;
    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }


    public function insert(Signalement $Signalement): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            //Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO signalement(id_formation, texte_signalement) VALUES(?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1,  $Signalement->getIdFormation()); 
            $cmd->bindValue(2,  $Signalement->getTexteSignalement());           
            // On exécute la requette
            $cmd->execute();
            // Nombre de lignes affectées (0 ou 1)
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        // Le retour de la méthode (l'output)
        return $affected;
    }


    public function getFormationsSignalees() {
        try {
            $sql = "SELECT * FROM formation f
            JOIN signalement s
            ON f.id_formation = s.id_formation;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            return [];
        }
    }

    public function deleteId($IdFormation): int {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            // Prépare la requête SQL
            $sql = "DELETE FROM signalement WHERE id_formation=?";
            $stmt = $this->pdo->prepare($sql);
            // Prepare la requête en passant les valeurs des paramètres
            $stmt->bindValue(1, $IdFormation);
            //On exécute la requette
            $stmt->execute();
            // Retourne le nombre de lignes affectées
            $affected= $stmt->rowCount();
        } catch (PDOException $e) {
            // Gère les exceptions
            $affected = -1;
        }
        return $affected;
    }




}