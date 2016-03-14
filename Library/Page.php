<?php
namespace Library;
/**
 * Description of Page
 *
 * @author hubert
 */

class Page extends ApplicationComponent
{
	protected $contentFile;
	protected $vars = array();
    
	public function addVar($var , $value){
		if(!is_string($var) || is_numeric($var) || empty($var)){
			throw new \InvalidArgumentException('Le nom de la variable
				doit être une chaine de de carractere non nulle');
		}

		$this->vars[$var] = $value;
	}

	/*
	*	cette fonction est charge de generer la parge final ou la
	* 	reponse a la requete http emit par l'emeteur
	*/
	public function getGeneratedPage(){
		
		//sinon l'execution continue normalelement;
		if(!file_exists($this->contentFile)){
			throw new \RuntimeException('La vue spécifiée 
				n\'existe pas : '.$this->contentFile);
		}

		
		
		ob_end_clean();

		extract($this->vars);
		ob_start();
			require $this->contentFile;
		$content = ob_get_clean();
		//si c'est une requete ajax, alors le controleur du module genere
		//toutes les données de sortie necessaires
		if($this->app()->httpRequest()->isAjax()){
			//echo "<br> C'est une requette ajax <br>";
			return $content;
		}

		//echo "<br> C'est une requette ajax ".$content."<br>";

		ob_start();
			require __DIR__.'/../Applications/'.
			$this->app->name().'/Templates/layout.php';
		return ob_get_clean();
	}

	public function contentFile(){
		return $this->contentFile;
	}

	public function setContentFile($contentFile)
	{
		if(!is_string($contentFile) || empty($contentFile)){
			throw new \InvalidArgumentException('La vue spécifiée
				est invalide');
		}
		$this->contentFile = $contentFile;
	}

    public function jsonSerialize() {
	    $json = array();
	    foreach($this as $key => $value) {
	        $json[$key] = $value;
	    }
	    return $json;
    }
}