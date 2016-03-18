<?php
namespace Library\Models;
use Library\Entities\Groupe;

class GroupeManager_PDO extends ManagerCrud{

	public function __construct($dao){
                parent::__construct($dao);
		$this->mapping = array(
				'id'=>'idgroupe',
				'nom'=>'nomGroupe',
				'idUser'=>'user_iduser',
			);

		$this->table_name = 'groupe';
	}
}