<?php

namespace Applications\Home\Modules\Home;

use Library\BackController;
use Library\HTTPRequest;
use Library\Entities\User;
use Library\Controls;
use Library\Config;
use Library\Api;

class HomeController extends BackController {

    public function executeIndex(HTTPRequest $http) {
        //on commence par recuperer toutes les dates d'envoi
        $manager = $this->managers->getManagerOf('SMSHasContact');
        $tabSMS = $manager->find();
/*
        //ensuite on recupere le nombre de sms par date d'envoie
        //tous les sms qui ont une date d'envoie null ne sont pas envoyés mais enregistrees
        $tabResults = array();
        //on compte le nombre de sms non envoyés
        $nbN = 0;
        $nbE = 0;
        //var_dump($tabSMS);
        foreach ($tabSMS as $s) {
            //on teste pour voir si le tableau contient deja la date en question
            $flag = false;
            $tempDate = explode(' ', $s->getSms()->getDateEnregistrement());
            //var_dump($tabResults);
            if(!array_key_exists($tempDate[0], $tabResults))
            {
                $tabResults['' . $tempDate[0] . ''] = array();
                $nbE=$nbN=0;
            }
            /*foreach ($tabResults as $r => $value) {
                if (explode(' ', $value['dateBrut'])[0] == $tempDate[0]) {
                    $flag = true;
                    break;
                }
            }
            if (!$flag) {
                //si la date n'est pas encore la
                //on l'augmente
                $tabResults['' . $tempDate[0] . ''] = array();
                $nbE=$nbN=0;
            }
            $temp=$tabResults['' . $tempDate[0] . ''];
            if(isset($temp['nbSMSN']))
            {
            $nbN=$temp['nbSMSN'];
            $nbE=$temp['nbSMSE'];
                
            }
            //echo 'testdebut';
            //var_dump($temp);
            //echo 'testfin';
            if (($s->getDateEnvoie() == null)||($s->getDateEnvoie() == '0000-00-00 00:00:00')||(($s->getDateEnvoie() == ''))) {
                $nbN++;
            } else {
                $nbE++;
            }
            
                    
            //var_dump($s);
            $j = explode('-', $tempDate[0])[2];
            $m = explode('-', $tempDate[0])[1];
            $y = explode('-', $tempDate[0])[0];
            switch ($m) {
                case '01': $m = 'janvier';
                    break;
                case 02: $m = 'fevrier';
                    break;
                case 03: $m = 'mars';
                    break;
                case 04: $m = 'avril';
                    break;
                case 05: $m = 'mai';
                    break;
                case 06: $m = 'juin';
                    break;
                case 07: $m = 'juillet';
                    break;
                case 08: $m = 'aout';
                    break;
                case 09: $m = 'septembre';
                    break;
                case 10: $m = 'octobre';
                    break;
                case 11: $m = 'novembre';
                    break;
                case 12: $m = 'decembre';
                    break;
            }
            $tabResults['' . $tempDate[0] . ''] = array('dateBrut' => $tempDate[0], 'date' => $j . '-' . $m . '-' . $y, 'nbSMSE' => $nbE, 'nbSMSN' => $nbN);
        }
         //var_dump($tabResults);**/
		 $tabResults=array();
		 
        $this->page()->addVar('results', $tabResults);
        $this->page()->getGeneratedPage();
    }

    public function executeRenvoi(HTTPRequest $http) {
        //var_dump($http->getData('date'));
        //annee-mois-jour
        //on commence par recuperer toutes les dates d'envoi
        $managerSMS = $this->managers->getManagerOf('SMS');
        $tabSMS = $managerSMS->find();

        $managerSMSC = $this->managers->getManagerOf('SMSHasContact');
        $comp = 0;
        foreach ($tabSMS as $s) {
            //echo'on est net';
            if (explode(' ', $s['dateEnregistrement'])[0] == $http->getData('date')) {
                $tabSMSC = $managerSMSC->find(array('sms' => $s['id']));
        //        echo 'tabsmsc';
          //      var_dump($tabSMSC);
                if(isset($tabSMSC[0])){
                $sms = $tabSMSC[0];
                if ($sms['dateEnvoie'] == null) {
                    //  echo 'il faut envoyer';
                    $api = new \Library\Api();
                    $config = new \Library\Config($this->app());
                    $contact = $sms['contact'];
                    $numeros = $contact['numeros'];
                    //       var_dump($contact);
                    //     var_dump($numeros);
                    foreach ($numeros as $n) {
                        //var_dump($s['corps']);
                        //var_dump(array(trim($n['numero'])));
                        //var_dump($api->envoi($config->get('usernameAPI'), $config->get('passwordAPI'), $config->get('senderAPI'), $s['corps'], array(trim($n['numero']))));
                        if ($api->envoi($config->get('usernameAPI'), $config->get('passwordAPI'), $config->get('senderAPI'), $s['corps'], array(trim($n['numero']))) == 'success') {
                            //on enregistre la date denvoie
                            $smshascontact = new \Library\Entities\SMSHasContact();
                            $smshascontact['id'] = $sms['id'];
                            $smshascontact['status'] = 'success';
                            $smshascontact['sms'] = $sms['sms'];
                            $smshascontact['contact'] = $sms['contact'];
                            $smshascontact['dateEnvoie'] = time();
                            //var_dump($smshascontact);
                            $managerSMSC->modify($smshascontact);
                            $comp++;
                        }
                    }
                    //
                    //echo 'puis si oui enregistrer la date Envoie';
                }
                //var_dump($sms);
                }
            }
        }
        $session=new \Library\Session();
        $session=$this->app()->session();
        if ($comp != 0) {
            $_SESSION['success_message'] = 'renvois de sms effectues avec succes!';
            $session->setAttribute('success_message', 'renvois de sms effectues avec succes!');
        } else {
            $_SESSION['info_message'] = 'Veuillez ressayer les renvois plutard!';
            $session->setAttribute('info_message', 'Veuillez ressayer les renvois plutard!');
        }
        
        $this->executeIndex($http);
        //$this->app()->httpResponse()->redirect('home/');
        //echo 'fin';
        //var_dump($tabSMS);
    }
    
    public function executeContacts(HTTPRequest $http) {
        $manager = $this->managers->getManagerOf('Contact');
        $this->page()->addVar('contacts' , $manager->find());
    }

}
