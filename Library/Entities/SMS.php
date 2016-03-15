<?php
namespace Library\Entities;
use Library\Entity;

class SMS extends Entity{
	/**
	* 	nom du departement
	*	@var string
	**/
	
    protected $corps;

    protected $dateEnvoie;

    protected $dateEnregistrement;

    protected $idUser;





    /**
     * Gets the value of corps.
     *
     * @return mixed
     */
    public function getCorps()
    {
        return $this->corps;
    }

    /**
     * Sets the value of corps.
     *
     * @param mixed $corps the corps
     *
     * @return self
     */
    protected function setCorps($corps)
    {
        $this->corps = $corps;

        return $this;
    }

    /**
     * Gets the value of dateEnvoie.
     *
     * @return mixed
     */
    public function getDateEnvoie()
    {
        return $this->dateEnvoie;
    }

    /**
     * Sets the value of dateEnvoie.
     *
     * @param mixed $dateEnvoie the date envoie
     *
     * @return self
     */
    protected function setDateEnvoie($dateEnvoie)
    {
        $this->dateEnvoie = $dateEnvoie;

        return $this;
    }

    /**
     * Gets the value of dateEnregistrement.
     *
     * @return mixed
     */
    public function getDateEnregistrement()
    {
        return $this->dateEnregistrement;
    }

    /**
     * Sets the value of dateEnregistrement.
     *
     * @param mixed $dateEnregistrement the date enregistrement
     *
     * @return self
     */
    protected function setDateEnregistrement($dateEnregistrement)
    {
        $this->dateEnregistrement = $dateEnregistrement;

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