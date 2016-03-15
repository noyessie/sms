<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\Numero;

class NumeroManager_PDO extends Manager{
	public function create(Numero $numero){

	}

	public function modify(Numero $numero){

	}

	public function delete(Numero $Numero){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new Numero();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new Numero();
		}
	}
}