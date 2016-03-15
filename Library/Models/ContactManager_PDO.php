<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\Contact;

class ContactManager_PDO extends Manager{
	public function create(Contact $contact){

	}

	public function modify(Contact $contact){

	}

	public function delete(Contact $Contact){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new Contact();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new Contact();
		}
	}
}