<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\Numero;

class NumeroManager_PDO extends Manager{


	public function __construct(){
		$this->mapping = array(
			'id'=>'idnumero',
			'numero'=>'numero',
			'idContact'=>'contact_idcontact'
		);
		$this->table_name = 'numero';
	}
}