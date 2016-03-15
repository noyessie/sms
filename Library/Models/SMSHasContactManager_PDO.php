<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\SMSHasContact;

class SMShasContactManager_PDO extends Manager{
	public function create(SMSHasContact $smshascontact){

	}

	public function modify(SMSHasContact $smshascontact){

	}

	public function delete(SMSHasContact $smshascontact){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new SMSHasContact();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new SMSHasContact();
		}
	}
}