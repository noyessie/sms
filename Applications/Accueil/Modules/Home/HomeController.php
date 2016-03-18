<?php
namespace Applications\Accueil\Modules\Home;
use Library\BackController;
use Library\HTTPRequest;
use Library\Entities\User;
use Library\Controls;

class HomeController extends BackController{
	public function executeIndex(HTTPRequest $http){
            $api=new \Api();
            $credit=$api->getCredit('', '');
            $this->page()->addVar('credit', $credit);
            $this->page()->getGeneratedPage();
            }
	
}