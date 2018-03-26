<?php
session_start();

use App\Model\Articles\ArticlesManager;

$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();

$title = 'Edition nouvel article | Jean Rochefort'; 

    if(isset($_POST['formArticle'])){

    	if(!empty($_POST['title']) AND !empty($_POST['content'])){

	        $articlesManagers = new ArticlesManager();
	        $result = $articlesManagers->createNew([

	        'title' => htmlspecialchars($_POST['title']),
	        'content' => htmlspecialchars($_POST['content']), 
	        'article_date' => 'Now()'

        	]);

        }else{

        	$error = 'Tous les champs doivent être remplis';

        }

    }


$form = new App\Controller\Form\Form($_POST); 

include_once 'App/View/Admin/Management/NewEditionView.php';