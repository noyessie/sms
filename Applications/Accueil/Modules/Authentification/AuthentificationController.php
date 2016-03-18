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
		if($this->app()->session()->isAuthenticated()){
			if($this->app()->session()->getAttribute('user')['username'] == 'admin'){
				$this->app()->httpResponse()->redirect('admin/home');
			}else{
				$this->app()->httpResponse()->redirect('etudiant/home');
			}
		}
		//si l'utilisateur fait une demande de connection
		if($http->postExists('login') && $http->postExists('password')){
			$login = $http->postData('login');
			$password = $http->postData('password');
			$search = array('login'=>$login , 'password'=>$password);
			$manager = $this->managers->getManagerOf('User');
			$result = $manager->find($search);
			if(count($result)==1){
				//l'uilisateur est connecter
				$user = $result[0];
				$this->app()->session()->setAuthenticated(true);
				$this->app()->session()->setAttribute('user' , $user);
				//on rediriger vers l'accueil
				if($user['username'] == 'admin'){
					$this->app()->httpResponse()->redirect('admin/home');
				}else{
					$this->app()->httpResponse()->redirect('etudiant/home');
				}
			}else{
				$error_message = " Bad Login or Incorrect Password ";
				$this->page()->addVar('error_message' , $error_message);
			}
		}
	}

	public function executeLogout(HTTPRequest $http){
		$this->app()->session()->setAuthenticated(false);
		$this->app()->session()->setAttribute('user' , null);
		$this->app()->httpResponse()->redirect('login');
		//$this->app()->session()->destroy();
	}
}