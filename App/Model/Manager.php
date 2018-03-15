<?php 

namespace App\Model;

class Manager{

	const DB_NAME = 'blog';

	const DB_USER = 'root';

	const DB_PASS = 'root';

	const DB_HOST = 'localhost';


	private static $database;


	public static function getDb(){

		if(self::$database === null){

			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);

		}

		return self::$database;

	}

	public static function Error(){

		header("HTTP/1.0 404 Not found");
    	header("Location: index.php?p=404");

	}
	

}