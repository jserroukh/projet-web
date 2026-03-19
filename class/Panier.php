<?php

class Panier {
    private $idPanier;
    private  $idUtilisateur;
    private  $idFormation;
    
    public function __construct(int $idPanier, int $idUtilisateur, int $idFormation) {
        $this->idFormation = $idFormation;
        $this->idUtilisateur = $idUtilisateur;
        $this->idFormation = $idFormation;
    }
    
    /**
     * Get the value of idPanier
     */ 
    public function getIdPanier()
    {
        return $this->idPanier;
    }

    /**
     * Set the value of idPanier
     *
     * @return  self
     */ 
    public function setIdPanier($idPanier)
    {
        $this->idPanier = $idPanier;

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