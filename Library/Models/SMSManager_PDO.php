<?php
namespace Library\Models;
use Library\Manager;
use Library\Entities\SMS;

class SMSManager_PDO extends Manager{
	public function create(SMS $sms){

	}

	public function modify(SMS $sms){

	}

	public function delete(SMS $Sms){

	}

	public function find($data = array()){

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new SMS();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new SMS();
		}
	}
}