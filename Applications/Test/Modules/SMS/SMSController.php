<?php
namespace Applications\Test\Modules\SMS;
use Library\BackController;
use Library\HTTPRequest;
use Library\Entities\SMS;
use Library\Entities\Contact;
use Library\Entities\ContactHasGroupe;
use Library\Entities\SMSHasContact;
use Library\Api;

use Library\Utilities;


class SMSController extends BackController{

	protected $tag = array(
			'nom'=>'(nom)',
			'prenom'=>'(prenom)',
			'groupe'=>'(groupe)',
			'contact'=>'(contact)',
			'email'=>'(email)'
		);
	
	public function executeIndex(HTTPRequest $http){
		$manager = $this->managers->getManagerOf('SMS');
		$this->page()->addVar('sms' , $manager->find());
	}

	public function executeCreate(HTTPRequest $http){
		$error_message = array();

		try{
			if($http->postExists('create')){
				$this->managers->beginTransaction();

				//on recupère les managers
				$manager = $this->managers->getManagerOf('SMS');
				$managerContact = $this->managers->getManagerOf('Contact');
				$managerContactHasGroupe = $this->managers->getManagerOf('ContactHasGroupe');
				$groupeManager = $this->managers->getManagerOf('Groupe');
				$numeroManager = $this->managers->getManagerOf('Numero');
				$smsHasContactManager = $this->managers->getManagerOf('SMSHasContact');

				$sms = new Sms();
				
				//on recupère les variable 
				$envoie = $http->postExists('send');
				$groupe = $http->postData('groupe');
				$sms['corps'] = $http->postData('message');
				
				//on enregistre le sms
				$manager->create($sms);

				//on recuperer le groupe choisit
				$groupe = $groupeManager->get($groupe);


				

				//contact correspondant au groupe
				$contacts = array();
				if($groupe['nom'] == 'Public'){
					$contacts = $managerContact->find();
				}else{
					$contactHasGroupe = $managerContactHasGroupe->find(array('groupe'=>$groupe));
					foreach($contactHasGroupe as $contacthasg){
						array_push($contacts , $contacthasg['contact']);
					}
				}

				//creation du message

				//on parcours les contacts, et on remplace chaque truc par ça correspondace, on obtient
				//les message cors
				$message_envoyer = []; 
				
				foreach($contacts as $contact){
					$corps = $sms['corps'];
					//on parcours les numeros du contact
					$numeros = $numeroManager->find(array('idContact'=>$contact['id']));

					//status d'un sms
					$sms_status = false;
					foreach($numeros as $numero){
						$corps = str_replace($this->tag['nom'] , $contact['nom'] , $corps);
						$corps = str_replace($this->tag['prenom'], $contact['nom'] , $corps);
						$corps = str_replace($this->tag['groupe'], $groupe['nom'] , $corps);
						$corps = str_replace($this->tag['contact'], $numero['numero'] , $corps);
						$corps = str_replace($this->tag['email'], $contact['email'] , $corps);

						if(preg_match('/(\\(.*\\))/', $corps, $matches)){
							throw new \Exception('invalid tag used');
						}

						//envoie du message
						if($envoie){
							Utilities::print_s('envoie du message : ' . $corps);
							$sms_status = Api::envoi('' , '' , 'NEO' , $corps , array($numero['numero'])) == Api::SUCCESS ? true : false;
						}
						$message_envoyer[] = $corps;
					}
					$sms_has_contact = new SMSHasContact();
					$sms_has_contact['sms'] = $sms;
					$sms_has_contact['contact'] = $contact;
					$sms_has_contact['status'] = $sms_status ? 1: 0;
					if($envoie){
						$sms_has_contact['dateEnvoie'] = time();

					}else{
						$sms_has_contact['dateEnvoie'] = 0;
					}
					
					$smsHasContactManager->create($sms_has_contact);
				}
				$this->managers->commit();

				$this->app()->httpResponse()->redirect('test/message/');
				
			}
		}catch(\Exception $e){
			Utilities::print_s('error ' . $e->getMessage());
			$this->page()->addVar('error' , $e->getMessage());
		}

		$groupes = $this->managers->getManagerOf('Groupe')->find();
		


		// $managerContact = new ContactManager_PDO($this->dao);
		// $managerContactHasGroupe = new ContactHasGroupeManager_PDO($this->dao);
		
		// for($i = 0 ; $i < count($groupes) ; $i++){
		// 	if($groupes[$i]['nom'] == 'Public'){
		// 		$groupes[$i]['contacts'] = $managerContact->find();
		// 	}else{
		// 		$contactHasGroupes = $managerContactHasGroupe->find(array('groupe'=>$groupes[$i]));
		// 		foreach($contactHasGroupes as $contacthasg){
		// 			array_push($groupe[$i]['contacts'] , $contacthasg['contact']);
		// 		}
		// 	}
		// }
		$this->page()->addVar('groupes' , $groupes);
	}

	public function executeDelete(HTTPRequest $http){
		$id = $http->getData('id');
		$manager = $this->managers->getManagerOf('Numero');
		$numero = new Numero();
		$numero['id'] = $id;

		$manager->delete($numero);

		$this->app()->httpResponse()->redirect('test/numero/');

	}

	public function executeSearch(HTTPRequest $http){
		
	}
}