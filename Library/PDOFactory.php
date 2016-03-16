<?php
namespace Library;
class PDOFactory
{
	public static function getMysqlConnexion()
	{
		$db = new \PDO('mysql:dbname=sms','root','');
		$db->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);
		return $db;
	}
}
