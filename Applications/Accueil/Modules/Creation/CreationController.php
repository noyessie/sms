<?php

namespace Applications\Accueil\Modules\Creation;

use Library\BackController;
use Library\HTTPRequest;
use Library\Controls;
use Library\Config;
use Library\Entities\Groupe;
use Library\Entities\ContactHasGroupe;
use Library\Entities\Contact;
use Library\Fichier;
use Library\Upload;

/**
 * classe permettant de creer les differents elements:
 * 1. un contact
 * 2. un groupe
 */
class CreationController extends BackController {

    /**
     * methode permettant de creer un groupe
     */
    public function executeIndex(HTTPRequest $http) {

        $manager = $this->managers->getManagerOf('Groupe');
        $groups = $manager->find();
        $this->page()->addVar('groups', $groups);
        $this->page()->getGeneratedPage();
    }

    /**
     * methode permettant d'enregistrer un groupe
     */
    public function executeCreergroupe(HTTPRequest $http) {
        $control = new \Library\Controls();
        $erreur = $control->validationChamp($http->postData('groupe'));

        if ($control->estVide($erreur)) {
            //on peut proceder a la suite
            echo 'on entre!';
            //on hydrate un bean qui va se charger de recuperer les infos et de faire la verification

            $manager = $this->managers->getManagerOf('Groupe');
            $group = new Groupe();

            $group['nom'] = $http->postData('groupe');
           // $group['idUser'] = 1;
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
    public function executeCreercontact(HTTPRequest $http) {
        $control = new \Library\Controls();
        $erreur = array();
        $erreur[] = $control->validationChamp($http->postData('nom'));
        //$erreur[]=$control->validationNumTel('00237',$http->postData('number1'));
        if ($http->postExists('number2')) {
            //  $erreur[]=$control->validationNumTel('00237',$http->postData('number2'));            
        }
        if ($http->postExists('number3')) {
            //$erreur[]=$control->validationNumTel('00237',$http->postData('number3'));        
        }
        $flag = false;
        if (!$http->postExists('groupeContact')) {
            $erreur[] = $control->validationChamp($http->postData('inputAutreGroupe'));
            $flag = true;
        }
        if ($control->estVideTab($erreur)) {
            //on peut proceder a la suite
            echo 'on entre!';
            //on hydrate un bean qui va se charger de recuperer les infos et de faire la verification
            //
            if ($flag) {
                $group['nom'] = $http->postData('inputAutreGroupe');
            } else {
                $group['nom'] = $http->postData('groupeContact');
            }
            $contactTo=array();
            $contactTo['nom']=$http->postData('nom');
            $contactTo['prenom']=$http->postData('prenom');
            $contactTo['email']=$http->postData('email');
            $contactTo['numero1']=$http->postData('number1');
            $contactTo['numero2']=$http->postData('number2');
            $contactTo['numero3']=$http->postData('number3');
            $contactTo['groupe']=$group['nom'];
            $this->saveContact($contactTo);
            // on se redirige
            echo 'cest fait';
        }
        $resultErreur = '';
        foreach ($erreur as $r) {
            $resultErreur = $resultErreur . PHP_EOL . $r;
        }
        $manager = $this->managers->getManagerOf('Groupe');
        $groups = $manager->find();
        $this->page()->addVar('groups', $groups);

        $this->page()->addVar('error_message', $resultErreur);
        $this->page()->getGeneratedPage();
    }

    /**
     * methode permettant l'uploade de contacts
     */
    public function executeUploadercontacts(HTTPRequest $http) {
        $fichier = new Fichier();
        //on uploade le fichier
        $config=new Config($this->app());
        $nombre=count($fichier->listeFichierRepertoire($config->get('cheminDossierReception')));
        $nombre++;
        $upload = new Upload();
        $resultUpload = $upload->uploaderGeneral($config->get('cheminDossierReception'), $config->get('nomFichier').$nombre.'.csv');
        $erreur = '';
        //puis on enregistre les elements dans la bd
        if ($resultUpload) {
            echo 'on arrice ic';
            $forme = array();
            $forme[] = 'nom';
            $forme[] = 'prenom';
            $forme[] = 'email';
            $forme[] = 'numero1';
            $forme[] = 'numero2';
            $forme[] = 'numero3';
            $result = $fichier->traiteFichier($config->get('cheminDossierReception').$config->get('nomFichier').$nombre.'.csv', $forme);
            //on passe a la validation tous les champs de tous les contacts
            var_dump($result);
            $flag = false;
            $tabContacts = array();
            foreach ($result as $elem) {
                var_dump($elem);
                if (!$this->validationContact($elem)) {
                    $flag = true;
                    break;
                }
                $contactTo=array();
                $contactTo['nom']=$elem['nom'];
                $contactTo['prenom']=$elem['prenom'];
                $contactTo['email']=$elem['email'];
                $contactTo['numero1']=$elem['numero1'];
                if(isset($elem['numero2']))
                {
                    $contactTo['numero2']=$elem['numero2'];
                }
                if(isset($elem['numero3']))
                {
                    $contactTo['numero3']=$elem['numero3'];
                }
                var_dump($http->postData('groupeUploadContact'));
                if($http->postExists('groupeUploadContact'))
                {
                    $contactTo['groupe']=$http->postData('groupeUploadContact');
                }else
                {
                    $contactTo['groupe']=$http->postData('inputAutreUploadGroupe');
                }
                
                $this->saveContact($contactTo);
            
            }
            if ($flag) {
                //y'a un contact invalide
                $erreur = 'Il y\'a des contacts invalides dans le fichier';
            } else {
                //puis on passe au mapping dans la base de données
                //
                //success
                echo 'success !';
            }
        } else {
            $erreur = 'Erreur lors de l\'upload du fichier';
        }
        $manager = $this->managers->getManagerOf('Groupe');
        $groups = $manager->find();
        $this->page()->addVar('groups', $groups);
        $this->page()->addVar('error_message', $erreur);
        $this->page()->getGeneratedPage();
    }

    /**
     * methode de validation d'un contact
     */
    private function validationContact($contact) {
        $controls = new Controls();
        $erreurs = array();
        if (isset($contact['nom'])) {
            $erreurs[] = $controls->validationChamp($contact['nom']);
            var_dump($erreurs);
        } else if (isset($contact['prenom'])) {
            //$erreurs[]=$controls->validationChamp($contact['prenom'])
            var_dump($erreurs);
        } else if (isset($contact['email'])) {
            //$erreurs[]=$controls->validationEmail($contact['email']);
            var_dump($erreurs);
        } else if (isset($contact['numero1'])) {
            //$erreurs[]=$controls->validationNombre($contact['numero1']);
            var_dump($erreurs);
        } else if (isset($contact['numero2'])) {
            //$erreurs[]=$controls->validationNombre($contact['numero2']);
            var_dump($erreurs);
        } else if (isset($contact['numero3'])) {
            //$erreurs[]=$controls->validationNombre($contact['numero3']);
            var_dump($erreurs);
        }
        var_dump($erreurs);
        return $controls->estVideTab($erreurs);
    }

    /**
     * methode d'enregistrement d'un contact
     */
    private function saveContact($contactTo) {
        $manager = $this->managers->getManagerOf('Contact');
        $contact = new Contact();

        $contact['nom'] = $contactTo['nom'];
        $contact['prenom'] = $contactTo['prenom'];
        $contact['email'] = $contactTo['email'];
       // $contact['idUser'] = 1;
        $numero = array();
        if (isset($contactTo['numero1'])) {
            $numero[] = $contactTo['numero1'];;
        }
        if (isset($contactTo['numero2'])) {
            $numero[] = $contactTo['numero2'];;
        }
        if (isset($contactTo['numero3'])) {
            $numero[] = $contactTo['numero3'];;
        }
        $contact['numero'] = $numero;
        $manager->create($contact);
        //on passe au mapping sur le groupe
        //recherche de l'id du contact
        $r=$manager->find(array('nom'=>$contactTo['nom'], 'prenom'=>$contactTo['prenom'], 'email'=>$contactTo['email']));
        $idcontact=$r[0]->getId();
        //var_dump($idcontact);
        //recherche de l'id du groupe
        $manager=$this->managers->getManagerOf('Groupe');
        $r=$manager->find(array('nomGroupe'=>$contactTo['groupe']));
        $idgroupe=$r[0]->getId();
        
        $manager1 = $this->managers->getManagerOf('ContactHasGroupe');
        $contacthasgroupe = new ContactHasGroupe();
        $contacthasgroupe['idcontact'] = $idcontact;
        $contacthasgroupe['idgroupe'] = $idgroupe;
        $manager1->create($contacthasgroupe);
    }

}
