<?php

class Utilisateur {
    
    private  $idUtilisateur;
    private  $pseudo;
    private  $mdp;
    private  $typeUtilisateur;
    //private  $emailUtilisateur;



    public function __construct(int $idUtilisateur = 0 , string $pseudo = "" , string $mdp= "", string $typeUtilisateur= ""  ) {
        $this->idUtilisateur = $idUtilisateur;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->typeUtilisateur = $typeUtilisateur;
    }
    
 

    /**
     * Get the value of typeUtilisateur
     */ 
    public function getTypeUtilisateur()
    {
        return $this->typeUtilisateur;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Get the value of idUtilisateur
     */ 
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Set the value of typeUtilisateur
     *
     * @return  self
     */ 
    public function setTypeUtilisateur($typeUtilisateur)
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
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
}
