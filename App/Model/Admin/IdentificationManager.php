<?php

namespace App\Model\Admin;

use App\Database;
use App\Model\Manager;


class IdentificationManager{


	public function sessionExist(){

		if($_SESSION['id'] == null) {

  			header('Location: http://localhost/php/admin.php?p=connection');
  			exit;

		}

	}

//Fonction pour interdire un membre connecté à acceder à differentes pages tel que la page de connexion	

	public function restrictionAdmin(){

		if(isset($_SESSION['id'])){

			header ("Location: http://localhost/php/admin.php?p=home" );
			exit;

		}

	}
	
	public function login($email, $password){

			
            $user = Manager::getDb()->prepare('SELECT * FROM members WHERE email = ?', [$email]);

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

