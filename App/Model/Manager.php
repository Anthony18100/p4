<?php 

namespace App\Model;

use App\Database;

/**
 * Manager 
 *
 * Connection à la BDD
 */

class Manager{

	/**
	 * Attributs
	 */

	const DB_NAME = 'blog';

	const DB_USER = 'root';

	const DB_PASS = 'root';

	const DB_HOST = 'localhost';


	private static $database;

	/**
	 * Connection BDD
	 * @return $database
	 */
	public static function getDb(){

		if(self::$database === null){

			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);

		}

		return self::$database;

	}


	/**
	 * errorVisitor
	 * @param  $errorType String
	 */
	public static function errorVisitor($errorType){

    	require 'App/View/Frontend/404.php';

	}


	/**
	 * errorAdmin
	 * @param  $errorType String
	 */
	public static function errorAdmin($errorType){

    	require 'App/View/Admin/404.php';

	}
	

}