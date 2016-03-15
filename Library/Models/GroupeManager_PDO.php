<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\Groupe;

class GroupeManager_PDO extends Manager{
	public function create(Groupe $groupe){

	}

	public function modify(Groupe $groupe){

	}

	public function delete(Groupe $Groupe){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new Groupe();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new Groupe();
		}
	}
}