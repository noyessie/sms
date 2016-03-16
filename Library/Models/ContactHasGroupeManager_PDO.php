<?php
namespace Library\Models;
use Library\Entities\ContactHasGroupe;

class ContactHasGroupeManager_PDO extends ManagerCrud{
	public function __construct(){
		$this->mapping = array(
				'id'=>'id_contact_has_groupe',
				'groupe'=>'groupe_idcontact',
				'contact'=>'contact_idcontact',
			)
	}


	public function bindValue($query , Entity $entity){
		foreach($this->$mapping as $key=>$val){
			if($key != 'id'){
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
		$groupe_manager = new GroupeManager_PDO($this->dao);
		$contact_manager = new ContactManager_PDO($this->dao);
		foreach($results as $r){
			$element = new $this->entity_class();
			$element['id'] = $r['id'];
			$element['groupe'] = $groupe_manager->find(array('id'=>$r['groupe']));
			$element['contact'] = $contact_manager->find(array('id'=>$r['contact']));
			$data[] = $element;
		}
		return $data;
	}
}