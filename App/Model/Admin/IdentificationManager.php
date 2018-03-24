<?php

namespace App\Model\Admin;

use App\Database;
use App\Model\Manager;


/**
 * Class IdentificationManager
 *
 * Class connection/disconnection the members and else session is active
 */

class IdentificationManager extends Manager{


/**
 * Method to prohibit the visitor from accessing the page
 * 
 * @return [Bool] Else Bool return true -> visitor redirect home
 */
	public function sessionExist(){

		if($_SESSION['id'] == null) {

  			header('Location: index.php?p=connection');
  			exit;

		}

	}


/**
 * [restrictionAdmin Restriction the pages membres]
 * @return [type] [description]
 */
	public function restrictionAdmin(){

		if(isset($_SESSION['id'])){

			header ("Location: admin.php?p=home&id=1" );
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

            			header ("Location: admin.php?p=home&id=1" );

            		}else{

            			return Session::setFlash('Vos identifiants sont incorrects', 'alert');

            		}


		        }else{

		        	return Session::setFlash('Vos identifiants sont incorrects', 'danger');
       		
            	}


        	}


}

