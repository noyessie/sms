<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\ContactHasGroupe;

class ContactHasGroupeManager_PDO extends Manager{
	public function create(ContactHasGroupe $contacthasgroupe){

	}

	public function modify(ContactHasGroupe $contacthasgroupe){

	}

	public function delete(ContactHasGroupe $ContactHasGroupe){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new ContactHasGroupe();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new ContactHasGroupe();
		}
	}
}