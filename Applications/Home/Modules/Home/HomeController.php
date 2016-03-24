<?php
namespace Applications\Home\Modules\Home;
use Library\BackController;
use Library\HTTPRequest;
use Library\Entities\User;
use Library\Controls;
use Library\Config;
use Library\Api;
class HomeController extends BackController{
	public function executeIndex(HTTPRequest $http){
            //on commence par recuperer toutes les dates d'envoi
            $manager = $this->managers->getManagerOf('SMSHasContact');
            $tabSMS = $manager->find();
            
            //ensuite on recupere le nombre de sms par date d'envoie
            //tous les sms qui ont une date d'envoie null ne sont pas envoyés mais enregistrees
            $tabResults=array();
            //on compte le nombre de sms non envoyés
            $nbN=0;
            $nbE=0;
            foreach($tabSMS as $s)
            {
                //on teste pour voir si le tableau contient deja la date en question
                $flag=false;
                $tempDate=  explode(' ', $s->getSms()->getDateEnregistrement());
                foreach($tabResults as $r=>$value)
                {
                    if(explode(' ',$value)[0]==$tempDate[0])
                    {
                        $flag=true;
                        break;
                    }
                }
                if(!$flag)
                {
                    //si la date n'est pas encore la
                    //on l'augmente
                    $tabResults[''.$tempDate[0].'']=array();
                }
                if($s->getDateEnvoie()==null)
                {
                    $nbN++;
                }else
                {
                    $nbE++;
                }
                $j=explode('-', $tempDate[0])[2];
                $m=explode('-', $tempDate[0])[1];
                $y=explode('-', $tempDate[0])[0];
                switch($m)
                {
                    case '01': $m='janvier';
                        break;
                    case 02: $m='fevrier';
                        break;
                    case 03: $m='mars';
                        break;
                    case 04: $m='avril';
                        break;
                    case 05: $m='mai';
                        break;
                    case 06: $m='juin';   
                        break;
                    case 07: $m='juillet';
                        break;
                    case 08: $m='aout';
                        break;
                    case 09: $m='septembre';
                        break;
                    case 10: $m='octobre';
                        break;
                    case 11: $m='novembre';
                        break;
                    case 12: $m='decembre';
                        break;
                }
                $tabResults[''.$tempDate[0].'']=array('dateBrut'=>$tempDate[0],'date'=>$j.'-'.$m.'-'.$y, 'nbSMSE'=>$nbE, 'nbSMSN'=>$nbN);
            }
           // var_dump($tabResults);
            $this->page()->addVar('results', $tabResults);
            $this->page()->getGeneratedPage();
            }
	public function executeRenvoi(HTTPRequest $http) {
            //var_dump($http->getData('date'));
            //annee-mois-jour
            //on commence par recuperer toutes les dates d'envoi
            $managerSMS = $this->managers->getManagerOf('SMS');
            $tabSMS = $managerSMS->find();
            
            $managerSMSC=$this->managers->getManagerOf('SMSHasContact');
            foreach($tabSMS as $s)
            {
                if(explode(' ', $s['dateEnregistrement'])[0]==$http->getData('date'))
                {
                    $tabSMSC = $managerSMSC->find(array('sms'=>$s['id']));
                    $sms=$tabSMSC[0];
                    if($sms['dateEnvoie']==null)
                    {
                        echo 'il faut envoyer';
                        $api=new \Library\Api();
                        $config=new \Library\Config($this->app());
                        $contact=$sms['contact'];
                        $numeros=$contact['numeros'];
                        var_dump($contact);
                        var_dump($numeros);
                        foreach($numeros as $n)
                        {
                            $api->envoi($config->get('usernameAPI'), $config->get('passwordAPI'), $config->get('senderAPI'), $s['corps'], $n);
                        }
                        //
                        echo 'puis si oui enregistrer la date Envoie';
                    }
                    var_dump($sms);
                }
            }
            echo 'fin';
            //var_dump($tabSMS);
            
        }
}