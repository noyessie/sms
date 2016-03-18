<?php
namespace Library\Entities;
use Library\Entity;

class Groupe extends Entity{
	
    protected $nom;





    /**
     * Gets the value of nom.
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Sets the value of nom.
     *
     * @param mixed $nom the nom
     *
     * @return self
     */
    protected function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}