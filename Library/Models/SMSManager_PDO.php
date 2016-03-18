<?php
namespace Library\Models;
use Library\Entities\SMS;

class SMSManager_PDO extends ManagerCrud{
	public function __construct($dao){
                parent::__construct($dao);
		$this->mapping = array(
				'id'=>'idsms',
				'corps'=>'corps',
				'dateEnvoie'=>'dateEnvoie',
				'dateEnregistrement'=>'dateEnregistrement',
				'idUser'=>'user_iduser',
			);
	}
}