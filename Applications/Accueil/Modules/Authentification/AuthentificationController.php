<?php
namespace Applications\Accueil\Modules\Authentification;
use Library\BackController;
use Library\HTTPRequest;

class AuthentificationController extends BackController{
	//permet l'authentification de l'utilisateur
	//si ce dernier est deja connecter et qui'l demander
	//une nouvelle authentification, on le rediriger vers
	//la page d'acceuil
	public function executeLogin(HTTPRequest $http){
		$this->page()->addVar('message' , 'open login');
	}

	public function executeLogout(HTTPRequest $http){
		// $this->app()->session()->setAuthenticated(false);
		// $this->app()->session()->setAttribute('user' , null);
		// $this->app()->httpResponse()->redirect('login');
		$this->page()->addVar('message', 'goodBye');
		$this->app()->session()->destroy();

	}
}