<?php

// On charge le fichier
require_once '../class/Commande.php';

// Déclaration de la classe
class CommandeModel
{
    // On déclare un attribut
    private PDO $pdo;
    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    public function insert(Commande $commande): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            //Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO commande ( id_utilisateur, date_commande, id_formation) VALUES (?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $commande->getIdUtilisateur());
            $cmd->bindValue(2, $commande->getDateCommande());
            $cmd->bindValue(3, $commande->getIdFormation());
            
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

   

    public function getCommandesUtilisateur($idUtilisateur) {
        try {
            $sql = "SELECT c.id_commande, c.date_commande, f.prix_formation, f.nom_formation
            FROM commande c
            JOIN formation f ON c.id_formation = f.id_formation
            WHERE c.id_utilisateur = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$idUtilisateur]);
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
            $sql = "DELETE FROM commande WHERE id_formation=?";
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