<?php
namespace Library\Models;
use Library\Entities\Numero;

class NumeroManager_PDO extends ManageCrud{


	public function __construct(){
		$this->mapping = array(
			'id'=>'idnumero',
			'numero'=>'numero',
			'idContact'=>'contact_idcontact'
		);
		$this->table_name = 'numero';
	}
}