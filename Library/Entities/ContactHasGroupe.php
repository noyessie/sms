<?php
namespace Library\Entities;
use Library\Entity;
use Library\Entities\Groupe;
use Library\Entities\Contact;

class ContactHasGroupe extends Entity{
	protected $idgroupe;

    protected $idcontact;

    

    /**
     * Gets the value of groupe.
     *
     * @return mixed
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }

    /**
     * Sets the value of groupe.
     *
     * @param mixed $groupe the groupe
     *
     * @return self
     */
    protected function setIdgroupe($idgroupe)
    {
        $this->idgroupe = $idgroupe;

        return $this;
    }

    /**
     * Gets the value of contact.
     *
     * @return mixed
     */
    public function getIdcontact()
    {
        return $this->idcontact;
    }

    /**
     * Sets the value of contact.
     *
     * @param mixed $contact the contact
     *
     * @return self
     */
    protected function setIdcontact($idcontact)
    {
        $this->idcontact = $idcontact;

        return $this;
    }
}