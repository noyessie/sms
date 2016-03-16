<?php
namespace Library;
use Library\Entity;
/**
 * Description of Manager
 *
 * @author hubert
 */

abstract class ManagerCrud extends Manager
{

	protected $table_name = "";

	protected $mapping = array();


	public function __construct(){

	}

	/*
	*
	* permte de faire un bindValue entre l'entité et la query
	*
	*/
	public function bindValue($query , Entity $entity){
		foreach($this->$mapping as $key=>$val){
			$query->bindValue($key , $entity[$key]);
		}
		return $query;
	}

	/*
	*
	*	fait correspondre les champs de la bases de données avec
	*	les noms de classe
	*/
	public function map(){
		$sql = "";
		foreach($this->$mapping as $key=>$val){
			if($key != 'id'){
				$sql = $sql . " " . $val . " := " . $key . " ";
			}
		}
		return $sql;
	}

	public function manager_class(){
		return get_class($this);
	}

	public function entity_class(){
		return str_replace( $this->manager_class , 'Manager_'.$this->dao , '' );
	}

	/*
	*
	*	pertmet de transforme le resultat d'une query en object 		
	*	correspondant
	*/
	public function fetch($query){

		$query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $this->entity_class);
		$results = $query->fetchAll();
		return $results;
	}

    public function create(Entity $entity){
		$sql = "INSERT INTO " . $this->table_name ." SET ";
		$sql .= map();
		$query = $this->dao->prepare($sql);
		$query = bindValue($query , $entity);
		
		return $query->execute();
	}

	public function modify(Entity $entity){
		$sql = "INSERT INTO " . $this->table_name ." SET ";
		$sql .= map();
		$sql = $sql . " WHERE " . $this->$mapping['id'] . " :=id ";
		$query = $this->dao->prepare($sql);
		$query = $this->bindValue($query , $entity);
		
		return $query->execute();
	}

	public function delete(Entity $entity){
		$sql = "DELETE FROM " . $this->table_name . " WHERE " . $this->$mapping['id'] . "=:id";
		$query = $this->dao->prepare($sql);
		$query->bindValue('id' , $entity['id']);

		return $query->execute();
	}

	public function find($data = array()){

		$sql = "SELECT ";

		foreach($this->$mapping as $key=>$val){
			$sql .= $val . " as " . $key . " ";
		}

		if(!empty($data) &&  (isset($data['id']) || isset($data['nom']))){

			$sql .= " WHERE TRUE ";
			foreach($data as $key=>$d){
				$sql .= " AND ". $this->$maping[$key] ."=:".$key." ";
			}
		}
		$sql .=";";



		$query = $this->dao->prepare($sql);
		foreach($data as $key=>$d){
			$query->bindValue($key , $d);
		}
		$query->execute();

		
		return $this->fetch();

	}

	public function get($id=0){
		if(!is_numeric($id)){
			return new Numero();
		}
		$result = $this->find(array('id'=>$id));
		if(count($result)>0){
			return $result[0];
		}else{
			return new Numero();
		}
	}
}