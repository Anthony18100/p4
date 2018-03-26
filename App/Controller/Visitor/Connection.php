<?php 
session_start();

use App\Model\Admin\IdentificationManager;
use App\Controller\Form\Form;

$restrictionAdmin = new IdentificationManager();
$restrictionAdmin->restrictionAdmin();

$form = new Form($_POST);
 
    if(isset($_POST['formConnection'])){

     	if(!empty($_POST['email']) AND !empty($_POST['password'])){

	        $auth = new IdentificationManager();
	        if($auth->login($_POST['email'], $_POST['password'])){

	          	header("Location: admin.php");
	          	exit;

	        }

	   	}else{

	   		$error = "Tous les champs doivent être remplis!";

	   	}

    }

require 'App/View/Frontend/ConnectionView.php';
