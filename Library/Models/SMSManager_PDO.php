<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\SMS;

class SMSManager_PDO extends ManagerCRUD{
	public function __construct(){
		$this->mapping = array(
				'id'=>'idsms',
				'corps'=>'corps',
				'dateEnvoie'=>'dateEnvoie',
				'dateEnregistrement'=>'dateEnregistrement',
				'idUser'=>'user_iduser',
			)
	}
}