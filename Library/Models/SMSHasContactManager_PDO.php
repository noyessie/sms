<?php
namespace Library\Models;
use Library\Entities\SMSHasContact;

class SMShasContactManager_PDO extends ManagerCrud{

	public function __construct($dao){
		parent::__construct($dao);
		$this->mapping = array(
				'id'=>'id_sms_has_contact',
				'sms'=>'sms_idsms',
				'contact'=>'contact_idcontact',
				'status'=>'etat',
				'dateEnregistrement'=>'dateEnregistrement',
			);
		$this->table_name = 'sms_has_contact';
	}

	public function bindValue($query , Entity $entity){
		foreach($this->$mapping as $key=>$val){
			if($key != 'status' && $key != 'id'){
				$query->bindValue($key , $entity[$key]['id']);
			}else{
				$query->bindValue($key , $entity[$key]);
			}
		}
		return $query;
	}

	public function fetch($query){
		$results = $query->fetchAll();
		$data= array();
		//sms manager
		$sms_manager = new SMSManager_PDO($this->dao);
		$contact_manager = new ContactManager_PDO($this->dao);
		foreach($results as $r){
			$element = new $this->entity_class();
			$element['id'] = $r['id'];
			$element['status']=$r['status'];
			$element['sms'] = $sms_manager->find(array('id'=>$r['sms']));
			$element['contact'] = $contact_manager->find(array('id'=>$r['contact']));
			$data[] = $element;
		}
		return $data;
	}
}