<?php

class Commande {
    
    private  $idCommande;
    private  $idUtilisateur;
    private  string $dateCommande;
    private  int $idFormation;



    public function __construct(int $idCommande, $idUtilisateur,string $dateCommande, int $idFormation) {
        $this->idCommande = $idCommande;
        $this->idUtilisateur = $idUtilisateur;
        $this->dateCommande = $dateCommande;
        $this->idFormation = $idFormation;
    }

    /**
     * Get the value of idCommande
     */ 
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * Set the value of idCommande
     *
     * @return  self
     */ 
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of idUtilisateur
     *
     * @return  self
     */ 
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * Get the value of dateCommande
     */ 
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * Set the value of dateCommande
     *
     * @return  self
     */ 
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    /**
     * Get the value of idFormation
     */ 
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * Set the value of idFormation
     *
     * @return  self
     */ 
    public function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;

        return $this;
    }
}