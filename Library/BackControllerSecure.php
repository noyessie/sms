<?php
namespace Library;

abstract class BackControllerSecure extends BackController{
	/**
	* 
	**/
	public function execute(){
		if($this->app()->session()->isAuthenticated()){
			parent::execute();
		}else{
			$this->executeNotLogged($this->app->httpRequest());
		}
	}


	/**
	*	this action is executed when the user is not logged. 
	* 	you cant redirect it for another page or display a 403 page 
	**/
	abstract function executeNotLogged(HTTPRequest $http);
}