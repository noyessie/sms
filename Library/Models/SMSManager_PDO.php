<?php
namespace Library\Models;
use Library\Entities\SMS;

class SMSManager_PDO extends ManagerCrud{
	public function __construct(){
		$this->mapping = array(
				'id'=>'idsms',
				'corps'=>'corps',
				'dateEnvoie'=>'dateEnvoie',
				'dateEnregistrement'=>'dateEnregistrement',
			)
		$this->table_name = "sms";
	}
}