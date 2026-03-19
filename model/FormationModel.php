<?php

// On charge le fichier
require_once '../class/Formation.php';

// Déclaration de la classe
class FormationModel
{
    // On déclare un attribut
    private PDO $pdo;
    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    public function insert(Formation $Formation): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            //Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO formation(nom_formation,prix_formation,informations_formation,img_formation,id_utilisateur,categorie_formation) VALUES(?,?,?,?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1,  $Formation->getNomFormation());
            $cmd->bindValue(2,  $Formation->getPrixFormation());
            $cmd->bindValue(3,  $Formation->getInformationsFormation());
            $cmd->bindValue(4,  $Formation->getImgFormation());
            $cmd->bindValue(5,  $Formation->getIdUtilisateur());
            $cmd->bindValue(6,  $Formation->getCategorieFormation());

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

    public function getAllFormations($pdo)
    {
        try {
            //l'ordre sql
            $query = "SELECT * FROM formation f
            JOIN utilisateur u
            ON f.id_utilisateur = u.id_utilisateur;";
            //execute l'ordre
            $stmt = $pdo->query($query);
            //return un tableau des valeurs
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            return [];
        }
    }

    public function getFormationById($pdo, int $idFormation)
    {
        // Préparation de la requête SQL avec un paramètre nommé
        $query = "SELECT * FROM formation WHERE id_formation = :idFormation";
        // Préparation de la requête PDO
        $stmt = $pdo->prepare($query);
        // Liaison du paramètre avec sa valeur
        $stmt->bindValue(':idFormation', $idFormation, PDO::PARAM_INT);
        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats sous forme de tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getAllFormationsLike(String $search)
    {
        try {
            $sql = "SELECT *
            FROM formation f
            JOIN utilisateur u ON f.id_utilisateur = u.id_utilisateur
            WHERE f.nom_formation LIKE ? OR f.categorie_formation LIKE ? OR pseudo LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $searchTerm = "%$search%";
            $stmt->bindValue(1, $searchTerm);
            $stmt->bindValue(2, $searchTerm);
            $stmt->bindValue(3, $searchTerm);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            return [];
        }
    }

    public function deleteId($IdFormation): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            // Prépare la requête SQL
            $sql = "DELETE FROM formation WHERE id_formation=?";
            $stmt = $this->pdo->prepare($sql);
            // Prepare la requête en passant les valeurs des paramètres
            $stmt->bindValue(1, $IdFormation);
            //On exécute la requette
            $stmt->execute();
            // Retourne le nombre de lignes affectées
            $affected = $stmt->rowCount();
        } catch (PDOException $e) {
            // Gère les exceptions
            $affected = -1;
        }
        return $affected;
    }
}
