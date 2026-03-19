<?php

class Signalement {
    private  $idSignalement;
    private  $idFormation;
    private  $texteSignalement;
    
    public function __construct(int $idSignalement,string $texteSignalement, int $idFormation) {
        $this->idSignalement = $idSignalement;
        $this->texteSignalement = $texteSignalement;
        $this->idFormation = $idFormation;
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
     * Get the value of idSignalement
     */ 
    public function getIdSignalement()
    {
        return $this->idSignalement;
    }

    /**
     * Set the value of idSignalement
     *
     * @return  self
     */ 
    public function setIdSignalement($idSignalement)
    {
        $this->idSignalement = $idSignalement;

        return $this;
    }

    /**
     * Set the value of texteSignalement
     *
     * @return  self
     */ 
    public function setTexteSignalement($texteSignalement)
    {
        $this->texteSignalement = $texteSignalement;

        return $this;
    }

    /**
     * Get the value of texteSignalement
     */ 
    public function getTexteSignalement()
    {
        return $this->texteSignalement;
    }

}