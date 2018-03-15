<?php

namespace App\Model\Admin;

use App\Cntr;
use App\Database;


class IdentificationManager{


	public function sessionExist(){

		if($_SESSION['id'] == null) {

  			header('Location: http://localhost/php/admin.php?p=connection');

		}

	}

	public function restrictionAdmin(){

		if(isset($_SESSION['id'])){

			header ("Location: http://localhost/php/admin.php?p=home" );

		}

	}
	
	public function login($mailconnect, $mdpconnect){

			$bdd = new \PDO('mysql:dbname=blog; host=localhost', 'root', 'root');

				$requser = $bdd->prepare("SELECT * FROM members WHERE email = ? AND password = ?");
		        $requser->execute(array($mailconnect, $mdpconnect));
		        $userexist = $requser->rowCount();
	        if($userexist == 1) {
	            $userinfo = $requser->fetch();
	            $_SESSION['id'] = $userinfo['id'];
	            header('Location: admin.php');
            }else{

            	$erreur = "Mauvais mdp ou id";

            }

            

          }

	
		


}

