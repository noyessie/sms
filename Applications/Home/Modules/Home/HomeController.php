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
            $api=new Api();
            $config=new Config($this->app());
            //$credit=$api->getCredit('patricksanang', 'cYiTdXqX');
            $credit=$api->getCredit($config->get('usernameAPI'), $config->get('passwordAPI'));
            $this->page()->addVar('credit', $credit);
            $this->page()->getGeneratedPage();
            }
	
}