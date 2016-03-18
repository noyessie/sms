<?php
namespace Applications\Test\Modules\SMS;
use Library\BackController;
use Library\HTTPRequest;
use Library\Entities\SMS;
use Library\Utilities;

class SMSController extends BackController{
	
	public function executeIndex(HTTPRequest $http){
		$manager = $this->managers->getManagerOf('SMS');
		$this->page()->addVar('sms' , $manager->find());
	}

	public function executeCreate(HTTPRequest $http){

		if($http->postExists('create')){
			$manager = $this->managers->getManagerOf('SMS');
			$managerContact = $this->managers->getManagerOf('Contact');
			$sms = new Sms();

			$sms['corps'] = $http->postData('message');
			$groupes = $http->postData('groupe');

			$manager->create($sms);
			$user = $managerUser->find()[0];



			$this->app()->httpResponse()->redirect('test/message/');
		}

		$groupes = $this->managers->getManagerOf('Groupe')->find();
		Utilities::print_table($groupes);
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