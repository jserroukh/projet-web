<?php

// On charge le fichier
require_once '../class/Panier.php';

// Déclaration de la classe
class PanierModel
{
    // On déclare un attribut
    private PDO $pdo;
    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }


    public function insert(Panier $panier): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            //Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO panier (id_utilisateur, id_formation) VALUES (?,?);");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $panier->getIdUtilisateur());
            $cmd->bindValue(2, $panier->getIdFormation());
            
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

    public function delete(Panier $panier): int {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            // Prépare la requête SQL
            $sql = "DELETE FROM panier WHERE id_utilisateur = ? AND id_formation = ?";
            $stmt = $this->pdo->prepare($sql);
            // Exécute la requête en passant les valeurs des paramètres
            $stmt->bindValue(1, $panier->getIdUtilisateur());
            $stmt->bindValue(2, $panier->getIdFormation());

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

    

    public function getAllFormationsPanier($utilisateur_id) {
        //l'ordre sql
        $query = "SELECT formation.*
        FROM formation
        INNER JOIN panier ON formation.id_formation = panier.id_formation
        WHERE panier.id_utilisateur = ?";
        $stmt = $this->pdo->prepare($query);
        //execute l'ordre
        $stmt->execute([$utilisateur_id]);
        //return un tableau des valeurs
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getFormationIdPanier($Idutilisateur) {
        //l'ordre sql
        $query = "SELECT id_formation FROM panier where id_utilisateur=?";
        $stmt = $this->pdo->prepare($query);
        //execute l'ordre
        $stmt->execute([$Idutilisateur]);
        //return un tableau des valeurs
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteAll($Idutilisateur): int {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            // Prépare la requête SQL
            $sql = "DELETE FROM panier where id_utilisateur=?";
            $stmt = $this->pdo->prepare($sql);
            // Prepare la requête en passant les valeurs des paramètres
            $stmt->bindValue(1, $Idutilisateur);
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


    public function getPanierFormation(Panier $panier): int {
        try {
            $sql = "SELECT * FROM panier where id_formation=? AND id_utilisateur=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $panier->getIdFormation());
            $stmt->bindValue(2, $panier->getIdUtilisateur());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            // Gérer les exceptions
            return -1;
        }
    }

    public function deleteId($IdFormation): int {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            // Prépare la requête SQL
            $sql = "DELETE FROM panier WHERE id_formation=?";
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