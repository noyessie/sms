<?php
namespace Applications\Test\Modules\Contact;
use Library\BackController;
use Library\HTTPRequest;
use Library\Entities\Contact;
use Library\Utilities;

class ContactController extends BackController{
	
	public function executeIndex(HTTPRequest $http){
		$manager = $this->managers->getManagerOf('Contact');
		$this->page()->addVar('contacts' , $manager->find());

	}

	public function executeCreate(HTTPRequest $http){

		if($http->postExists('create')){
			$manager = $this->managers->getManagerOf('Contact');
			$contact = new Contact();

			$contact['nom'] = $http->postData('nom');
			$contact['prenom'] = $http->postData('prenom');
			$contact['email'] = $http->postData('email');
			
			//$numero = $http->postData('contact');

			$manager->create($contact);
			$this->app()->httpResponse()->redirect('test/contact/');
		}
	}

	public function executeDelete(HTTPRequest $http){
		$id = $http->getData('id');
		$manager = $this->managers->getManagerOf('Contact');
		$contact = new Contact();
		$contact['id'] = $id;

		$manager->delete($contact);

		$this->app()->httpResponse()->redirect('test/contact/');

	}

	public function executeSearch(HTTPRequest $http){
		
	}
}