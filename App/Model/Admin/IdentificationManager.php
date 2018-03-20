<?php

namespace App\Model\Admin;

use App\Database;
use App\Model\Manager;


/**
 * Class IdentificationManager
 *
 * Cette classe est utilisé pour la connexion/déconnexion des membres et de savoir si une session est active
 */

class IdentificationManager{


/**
 * [sessionExist Connaître si la $_SESSION est active]
 * @return [type] [description]
 */
	public function sessionExist(){

		if($_SESSION['id'] == null) {

  			header('Location: http://localhost/php/admin.php?p=connection');
  			exit;

		}

	}


/**
 * [restrictionAdmin Restriction des pages que aux membres]
 * @return [type] [description]
 */
	public function restrictionAdmin(){

		if(isset($_SESSION['id'])){

			header ("Location: http://localhost/php/admin.php?p=home" );
			exit;

		}

	}


/**
 * [login Verification si l'utilisateur existe (formulaire de connexion)]
 * @param  [string] $email    [$_POST['email']
 * @param  [string] $password [$_POST['password']
 * @return [bool]           [renvoye true si l'utilisateur existe]
 */
	public function login($email, $password){

			
            $user = Manager::getDb()->prepare('SELECT * FROM members WHERE email = ?', [$email], null, false);

            	if($user){

            		if($user->password === sha1($password)){

            			$_SESSION['id'] = $user->id;

            			header ("Location: http://localhost/php/admin.php?p=home" );
						exit;

            		}		

            	}

            	die('non');

          	}

	
		


}

