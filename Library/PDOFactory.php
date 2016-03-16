<?php
namespace Library;
class PDOFactory
{
	public static function getMysqlConnexion()
	{
<<<<<<< HEAD
		$db = new \PDO('mysql:dbname=mydb','dev','');
=======
		$db = new \PDO('mysql:dbname=sms','root','');
>>>>>>> 570b1b1806f824467591b10f3b147f76c37b409b
		$db->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
		return $db;
	}
}
