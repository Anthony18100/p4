<?php 
session_start();

use App\Model\Articles\ArticlesManager;

$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();

//Reccuperation de l'article correspondant avec $_GET['id']
$id_article = $_GET['id'];

//Appel de methode pour afficher l'article correspondant
$articlesManagers = new ArticlesManager();
$article = $articlesManagers->getArticle($id_article);	

if($article === false){

	Manager::Error();
    
}		

if(isset($_POST['formArticle'])){

    if(!empty($_POST['title']) AND !empty($_POST['content'])){

	    $articlesManagers = new ArticlesManager();
	    $article = $articlesManagers->update($_GET['id'], [

		    'title' => htmlspecialchars($_POST['title']),
		    'content' => htmlspecialchars($_POST['content'])

	    ]);

	}else{

		$error = "Tous les champs doivent être remplis";

	}

}

$form = new App\Controller\Form\Form($article);

require 'App/View/Admin/Management/EditionView.php';