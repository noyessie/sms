<?php
namespace Library\Entities;
use Library\Entity;

class ContactHasGroupe extends Entity{
	protected $groupe;

    protected $contact;

    

    /**
     * Gets the value of groupe.
     *
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Sets the value of groupe.
     *
     * @param mixed $groupe the groupe
     *
     * @return self
     */
    protected function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Gets the value of contact.
     *
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Sets the value of contact.
     *
     * @param mixed $contact the contact
     *
     * @return self
     */
    protected function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }
}