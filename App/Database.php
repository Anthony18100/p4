<?php 

namespace App;
use \PDO;

class Database{

	/**
	 * Attributs
	 */

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	/**
	 * Connection BDD
	 * @param string $db_name [Name BDD]
	 * @param string $db_user [User BDD]
	 * @param string $db_pass [Pass BDD]
	 * @param string $db_host [Host BDD]
	 */
	public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost'){

		$this->db_name = $db_name;

		$this->$db_user = $db_user;

		$this->$db_pass = $db_pass;

		$this->$db_host = $db_host;

	}

	/**
	 * getPDO Verified connection database exist
	 * @return [String] [connection database]
	 */
	private function getPDO(){

		if($this->pdo === null){

			$pdo = new PDO('mysql:dbname=blog; host=localhost', 'root', 'root');

			$pdo->pdo = $pdo;

			$this->pdo = $pdo;

		}

		return $this->pdo;

	}

	/**
	 * Method query
	 */
	public function query($statement, $class_name = null, $one = false){

		$req = $this->getPDO()->query($statement);

		if(

			strpos($statement, 'UPDATE') === 0 ||

			strpos($statement, 'INSERT') === 0 ||

			strpos($statement, 'DELETE') === 0 

		){

			return $req;

		}

		if($class_name === null){

			$req->setFetchMode(PDO::FETCH_OBJ);	

		}else{

			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);

		}


		if($one === false){

			$datas = $req->fetch();

		}else{

			$datas = $req->fetchAll();

		}

		return $datas;

	}


	


	public function prepare($statement, $attributes, $class_name = null, $one = false){

		$req = $this->getPDO()->prepare($statement);

		$res = $req->execute($attributes);

		if(

			strpos($statement, 'UPDATE') === 0 ||

			strpos($statement, 'INSERT') === 0 ||

			strpos($statement, 'DELETE') === 0 

		){

			return $res;
		}

		if($class_name === null){

			$req->setFetchMode(PDO::FETCH_OBJ);	

		}else{

			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);

		}

		if($one === false){

			$datas = $req->fetch();

		}else{

			$datas = $req->fetchAll();

		}


		return $datas;

	}


}