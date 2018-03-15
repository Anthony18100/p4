<?php 
//Classe connexion a la base de donnée
namespace App;

use \PDO;

class Database{

	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;


	public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost'){

		$this->db_name = $db_name;

		$this->$db_user = $db_user;

		$this->$db_pass = $db_pass;

		$this->$db_host = $db_host;

	}

//Acesseur permettant la connexion a la base donnée..
//On verifie si il y a deja eu une connexion si c'est le cas on voit sur mon attribut $PDO
//Si on est pas connecte $pdo l35
	private function getPDO(){

		if($this->pdo === null){

			$pdo = new PDO('mysql:dbname=blog; host=localhost', 'root', 'root');

			$pdo->pdo = $pdo;

			$this->pdo = $pdo;

		}

		return $this->pdo;

	}

	public function query($statement, $class_name = null, $one = false){

		$req = $this->getPDO()->query($statement);

		if($class_name === null){

			$req->setFetchMode(PDO::FETCH_OBJ);	

		}else{

			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);

		}


		if($one){

			$datas = $req->fetch();

		}else{

			$datas = $req->fetchAll();

		}

		return $datas;

	}

	public function prepare($statement, $attributes, $class_name = null, $one = false){

		$req = $this->getPDO()->prepare($statement);

		$req->execute($attributes);

		if($class_name === null){

			$req->setFetchMode(PDO::FETCH_OBJ);	

		}else{

			$req->setFetchMode(PDO::FETCH_CLASS, $class_name);

		}

		if($one){

			$datas = $req->fetch();

		}else{

			$datas = $req->fetchAll();

		}


		return $datas;

	}


}