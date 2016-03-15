<?php
namespace Applications\Accueil;

use Library\Application;

class AccueilApplication extends Application{
	public function __construct(){
		parent::__construct();
		$this->name = "Accueil";
	}

	public function run(){
		$controller = $this->getController();
		$controller->execute();
		$this->httpResponse->setPage($controller->page());
		$this->httpResponse->send();
	}
}