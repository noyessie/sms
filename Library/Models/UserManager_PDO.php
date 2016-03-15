<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\User;

class UserManager_PDO extends Manager{
	public function create(User $user){

	}

	public function modify(User $user){

	}

	public function delete(User $user){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new User();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new User();
		}
	}
}