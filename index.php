
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); 

require 'Library/autoload.php';

$app = "Backend";
if(isset($_GET['app']) && file_exists(__DIR__."/Applications/".$_GET['app']."/".$_GET['app']."Application.php")){
	$app = $_GET['app'];
}


$class = "Applications\\".$app."\\".$app."Application"; 


$app = new $class();
$app->run();

//$t1 = new Test\Test_user_manager();
//$t1->execute();
/*


LISTE dES FONCTIONNALITES (CHECKPOINTS)

1- CONCEPTION DE LA BASE dE DONNEES (fait)
2- CREATION DES OBJECTS DE MAPAGES (fait)
3- CREATION DES MANAGERS (faits)
4- MODULES D'AUTHENTIFICATION DU BACKEND (fait)
5- MODULES D'ADMINISTRATION DU BACKEND 
	a-fonctionnalites
	i- ajout des etudiants
		-via une interface (ok)
		-via un fichier.(ok)//TODO::enregristrer le departement
		formatage du fichier csv:matricule;nom;prenom;email;niveau;rangNiveauPrecedent
	iii-interface de chargement des information sur les stage
		a- ajout du module de gestion des departement (ok)
		b- ajout du module de gestion des entreprise (ok)
		-via une interface (ok)
		-via un fichier (ok)
		formatage du fichier csv: description du stage sur chaque ligne
	iii- interface d'attribution manuel des stages (plus cote client)
	iv-interface de publication des stages
	v-voir et imprimer les possibilités de stages

*/