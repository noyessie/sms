<?php
namespace Library\Entities;
use Library\Entity;

class Groupe extends Entity{
	
    protected $nom;

    protected $idUser;





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

    /**
     * Gets the value of idUser.
     *
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Sets the value of idUser.
     *
     * @param mixed $idUser the id user
     *
     * @return self
     */
    protected function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }
}