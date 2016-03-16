<?php
namespace Applications\Accueil\Modules\Authentification;
use Library\BackController;
use Library\HTTPRequest;
use Library\Controls;

class AuthentificationController extends BackController{
	//permet l'authentification de l'utilisateur
	//si ce dernier est deja connecter et qui'l demander
	//une nouvelle authentification, on le rediriger vers
	//la page d'acceuil
	public function executeLogin(HTTPRequest $http){
            $this->page()->addVar('message' , 'open login');
            /*var_dump($http);
            var_dump($http->postData('login'));*/
            //on commence par le test
            $control=new \Library\Controls();
            $erreur=$control->validationChamp($http->postData('login'));
           //on controle le password
            if(!$control->estVide($erreur))
            {
                $erreur=$erreur.PHP_EOL.$control->validationChamp($http->postData('password'));
            }else
            {
                $erreur=$control->validationChamp($http->postData('password'));
            }
            
        if($control->estVide($erreur))
        {
            //on peut proceder a la suite
                echo 'on entre!';
            //on hydrate un bean qui va se charger de recuperer les infos et de faire la verification
                $user_pdo=new \Library\Models\UserManager_PDO();
                $tabUser=$user_pdo->find();
                foreach($tabUser as $user)
                {
                    if(($user['email']==$http->postData('login'))&&($user['password']==$http->postData('password')))
                    {
                            //c'est ok!
                            //on continue dans la plateforme
                            
                        break;
                    }
                }
                //sinon c'est le ndem, on rentre à la page de depart
                $erreur="Utilisateur inconnu!";
               
	}
        $this->page()->addVar('error_message', $erreur);
        $this->page()->getGeneratedPage();
        }
	public function executeLogout(HTTPRequest $http){
		// $this->app()->session()->setAuthenticated(false);
		// $this->app()->session()->setAttribute('user' , null);
		// $this->app()->httpResponse()->redirect('login');
		$this->page()->addVar('message', 'goodBye');
		$this->app()->session()->destroy();

	}
        public function __construct($app, $module, $action)
	{
		parent::__construct($app, $module, $action);
	}
        
}