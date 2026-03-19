<?php

class Commentaire {
    
    private  $idCommentaire;
    private  $texteCommentaire;
    private  $idFormation;
    private  $idUtilisateur;



    public function __construct(int $idCommentaire, $texteCommentaire, $idFormation, $idUtilisateur) {
        $this->idCommentaire = $idCommentaire;
        $this->texteCommentaire = $texteCommentaire;
        $this->idFormation = $idFormation;
        $this->idUtilisateur = $idUtilisateur;
    }


    /**
     * Get the value of idCommentaire
     */ 
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * Set the value of idCommentaire
     *
     * @return  self
     */ 
    public function setIdCommentaire($idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;

        return $this;
    }

    /**
     * Get the value of texteCommentaire
     */ 
    public function getTexteCommentaire()
    {
        return $this->texteCommentaire;
    }

    /**
     * Set the value of texteCommentaire
     *
     * @return  self
     */ 
    public function setTexteCommentaire($texteCommentaire)
    {
        $this->texteCommentaire = $texteCommentaire;

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
}