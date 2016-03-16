<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\User;

class UserManager_PDO extends ManagerCRUD{

	

	public function __construct(){
		parent::construct();
		$this->mapping = array(
			'id'=>'iduser',
			'nom'=>'nom',
			'prenom'=>'prenom',
			'email'=>'adressemail',
			'password'=>'motdepasse',
		);
		$this->table_name = "User";
	}
}