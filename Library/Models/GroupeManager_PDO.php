<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\Groupe;

class GroupeManager_PDO extends Manager{

	public function __construct(){
		$this->mapping = array(
				'id'=>'idgroupe',
				'nom'=>'nomGroupe',
				'idUser'=>'user_iduser',
			)

		$this->table_name = 'groupe';
	}
}