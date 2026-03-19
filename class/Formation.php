<?php

class Formation {
    
    private  $idFormation;
    private  $nomFormation;
    private  $prixFormation;
    private  $informationsFormation;
    private  $imgFormation;
    private  $idUtilisateur;
    private  $categorieFormation;



    public function __construct(int $idFormation, $nomFormation, $prixFormation, $informationsFormation, $imgFormation, $idUtilisateur, $categorieFormation) {
        $this->idFormation = $idFormation;
        $this->nomFormation = $nomFormation;
        $this->prixFormation = $prixFormation;
        $this->informationsFormation = $informationsFormation;
        $this->imgFormation = $imgFormation;
        $this->idUtilisateur = $idUtilisateur;
        $this->categorieFormation = $categorieFormation;
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
     * Get the value of nomFormation
     */ 
    public function getNomFormation()
    {
        return $this->nomFormation;
    }

    /**
     * Set the value of nomFormation
     *
     * @return  self
     */ 
    public function setNomFormation($nomFormation)
    {
        $this->nomFormation = $nomFormation;

        return $this;
    }

    /**
     * Get the value of prixFormation
     */ 
    public function getPrixFormation()
    {
        return $this->prixFormation;
    }

    /**
     * Set the value of prixFormation
     *
     * @return  self
     */ 
    public function setPrixFormation($prixFormation)
    {
        $this->prixFormation = $prixFormation;

        return $this;
    }

    /**
     * Get the value of informationsFormation
     */ 
    public function getInformationsFormation()
    {
        return $this->informationsFormation;
    }

    /**
     * Set the value of informationsFormation
     *
     * @return  self
     */ 
    public function setInformationsFormation($informationsFormation)
    {
        $this->informationsFormation = $informationsFormation;

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
     * Get the value of categorieFormation
     */ 
    public function getCategorieFormation()
    {
        return $this->categorieFormation;
    }

    /**
     * Set the value of categorieFormation
     *
     * @return  self
     */ 
    public function setCategorieFormation($categorieFormation)
    {
        $this->categorieFormation = $categorieFormation;

        return $this;
    }

    /**
     * Get the value of imgFormation
     */ 
    public function getImgFormation()
    {
        return $this->imgFormation;
    }

    /**
     * Set the value of imgFormation
     *
     * @return  self
     */ 
    public function setImgFormation($imgFormation)
    {
        $this->imgFormation = $imgFormation;

        return $this;
    }
}