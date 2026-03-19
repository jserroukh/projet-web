<?php

// On charge le fichier
require_once '../class/Utilisateur.php';

// Déclaration de la classe
class UtilisateurModel
{
    // On déclare un attribut
    private PDO $pdo;
    // Le constructeur qui a comme paramètre un objet PDO et qui sera exécuté automatiquement quand on va instancier l'objet
    function __construct(PDO $pdo)
    {
        // On affecte la valeur du paramètre à l'attribut
        $this->pdo = $pdo;
    }

    public function insert(Utilisateur $Utilisateur): int
    {
        // Déclaration d'une variable qui servira pour le retour
        $affected = 0;
        try {
            //Compilation ...
            $cmd = $this->pdo->prepare("INSERT INTO utilisateur (pseudo, mdp, type_utilisateur) VALUES(?,?,?)");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $Utilisateur->getPseudo());
            $cmd->bindValue(2, $Utilisateur->getMdp());
            $cmd->bindValue(3, $Utilisateur->getTypeUtilisateur());
            
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


    public function selectWherePseudo(Utilisateur $Utilisateur): int 
    {
        try{
            //Compilation ...
            $cmd= $this->pdo->prepare("SELECT * FROM utilisateur WHERE pseudo=? ");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $Utilisateur->getPseudo());
            // On exécute la requette
            $cmd->execute();
            $affected = $cmd->rowCount();
        } catch (PDOException $e) {
            $affected = -1;
        }
        // Le retour de la méthode (l'output)
        return $affected;
    }

    public function selectMDPWherePseudo(Utilisateur $Utilisateur) 
    {
        try{
            //Compilation ...
            $cmd= $this->pdo->prepare("SELECT mdp FROM utilisateur WHERE pseudo=? ");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $Utilisateur->getPseudo());
            // On exécute la requette
            $cmd->execute();        
            $result = $cmd->fetchColumn();
        } catch (PDOException $e) {
            $result = -1;
        }
        // Le retour de la méthode (l'output)
        return $result;
    }
    
    

    public function selectId(Utilisateur $Utilisateur): int 
    {
        try{
            //Compilation ...
            $cmd= $this->pdo->prepare("SELECT id_utilisateur FROM utilisateur WHERE pseudo=? ");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $Utilisateur->getPseudo());
            // On exécute la requette
            $cmd->execute();
           
            $result = $cmd->fetchColumn();
        } catch (PDOException $e) {
            $result = -1;
        }
        // Le retour de la méthode (l'output)
        return $result;
    }

    public function selectType(Utilisateur $Utilisateur) 
    {
        try{
            //Compilation ...
            //possible car le pseudo est unique
            $cmd= $this->pdo->prepare("SELECT type_utilisateur FROM utilisateur WHERE pseudo=? ");
            // Valorisation des paramètres (les ?) avec le résultat de la sollicitation de la méthode GETTER de l'objet Utilisateur
            $cmd->bindValue(1, $Utilisateur->getPseudo());
            // On exécute la requette
            $cmd->execute();
           
            $result = $cmd->fetchColumn();
        } catch (PDOException $e) {
            $result = -1;
        }
        // Le retour de la méthode (l'output)
        return $result;
    }
}
