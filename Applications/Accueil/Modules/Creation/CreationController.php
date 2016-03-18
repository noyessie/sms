<?php
namespace Applications\Accueil\Modules\Creation;
use Library\BackController;
use Library\HTTPRequest;
use Library\Controls;
use Library\Entities\Groupe;
use Library\Entities\ContactHasGroupe;
use Library\Entities\Contact;
/**
 * classe permettant de creer les differents elements:
 * 1. un contact
 * 2. un groupe
 */
class CreationController extends BackController{

    /**
     * methode permettant de creer un groupe
     */
    public function executeIndex(HTTPRequest $http) {
        
        $manager = $this->managers->getManagerOf('Groupe');
        $groups=$manager->find();
        $this->page()->addVar('groups' , $groups);
        $this->page()->getGeneratedPage();
    }
    /**
     * methode permettant d'enregistrer un groupe
     */
    public function executeCreergroupe(HTTPRequest $http)
    {
        $control=new \Library\Controls();
        $erreur=$control->validationChamp($http->postData('groupe'));
            
        if($control->estVide($erreur))
        {
            //on peut proceder a la suite
                echo 'on entre!';
            //on hydrate un bean qui va se charger de recuperer les infos et de faire la verification
                
                $manager = $this->managers->getManagerOf('Groupe');
		$group = new Groupe();

		$group['nom'] = $http->postData('groupe');
		$group['idUser']=1;
                var_dump($group);
                var_dump($manager);
                $manager->create($group);   
            // on se redirige
            echo 'cest fait';
               
	}
        $this->page()->addVar('error_message', $erreur);
        $this->page()->getGeneratedPage();
        
    }
    /**
     * methode permettant d'enregistrer un contact
     */
    public function executeCreercontact(HTTPRequest $http)
    {
        $control=new \Library\Controls();
        $erreur=array();
        $erreur[]=$control->validationChamp($http->postData('nom'));
        //$erreur[]=$control->validationNumTel('00237',$http->postData('number1'));
        if($http->postExists('number2'))
        {
          //  $erreur[]=$control->validationNumTel('00237',$http->postData('number2'));            
        }
        if($http->postExists('number3'))
        {
            //$erreur[]=$control->validationNumTel('00237',$http->postData('number3'));        
        }
        $flag=false;
        if(!$http->postExists('groupeContact'))
        {
            $erreur[]=$control->validationChamp($http->postData('inputAutreGroupe'));
            $flag=true;
        }
        if($control->estVideTab($erreur))
        {
            //on peut proceder a la suite
                echo 'on entre!';
            //on hydrate un bean qui va se charger de recuperer les infos et de faire la verification
                
                $manager = $this->managers->getManagerOf('Contact');
		$contact = new Contact();

		$contact['nom'] = $http->postData('nom');
		$contact['prenom'] = $http->postData('prenom');
                $contact['email'] = $http->postData('email');
                $contact['idUser'] = 1;
                $numero=array();
                if($http->postExists('number1'))
                {
                    $numero[]=$http->postData('number1');
                }
                if($http->postExists('number2'))
                {
                    $numero[]=$http->postData('number2');
                }
                if($http->postExists('number3'))
                {
                    $numero[]=$http->postData('number3');
                }
                $contact['numero'] = $numero;
                $manager->create($contact);
                //on passe au mapping sur le groupe
                $manager = $this->managers->getManagerOf('ContactHasGroupe');
		$contacthasgroupe = new ContactHasGroupe();
                $contacthasgroupe['contact']=$contact;
                $group=new Groupe();
                if($flag)
                {
                    $group['nom']=$http->postData('inputAutreGroupe');
                }else
                {
                    $group['nom']=$http->postData('groupeContact');
                }
                $group['idUser']=1;
                $contacthasgroupe['groupe']=$group;
                $manager->create($contacthasgroupe);
                

            // on se redirige
            echo 'cest fait';
               
	}
        $resultErreur='';
        foreach($erreur as $r)
        {
            $resultErreur=$resultErreur.PHP_EOL.$r;
        }
        $manager = $this->managers->getManagerOf('Groupe');
        $groups=$manager->find();
        $this->page()->addVar('groups' , $groups);
        
        $this->page()->addVar('error_message', $resultErreur);
        $this->page()->getGeneratedPage();
        
    }
}