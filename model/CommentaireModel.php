<?php

// On charge le fichier
require_once '../class/Commentaire.php';

// Déclaration de la classe
class CommentaireModel
{
    // On déclare un attribut
    private PDO $pdo;
    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    public function insert(Commentaire $commentaire): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            //Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO commentaire (texte_commentaire, id_formation,id_utilisateur) VALUES (?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation des méthodes GETTER de l'objet Commentaire
            $cmd->bindValue(1, $commentaire->getTexteCommentaire());
            $cmd->bindValue(2, $commentaire->getIdFormation());
            $cmd->bindValue(3, $commentaire->getIdUtilisateur());

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

    public function getCommentaireFormations($idFormation)
    {
        try {
            $sql = "SELECT * FROM commentaire c
            JOIN utilisateur u
            ON u.id_utilisateur = c.id_utilisateur
            WHERE id_formation = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idFormation);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            return [];
        }
    }
}
