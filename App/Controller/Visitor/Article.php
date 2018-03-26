<?php 
use App\Model\Articles\ArticlesManager;
use App\Model\Comments\CommentsManager;
use App\Controller\Form\Form;

if(!empty($_POST['formArticle'])){

		if(!empty($_POST['pseudo']) AND !empty($_POST['comment'])){

			$result = CommentsManager::newComment($_GET['id'],[

				 	'pseudo' => htmlspecialchars($_POST['pseudo']),
				    'comment' => htmlspecialchars($_POST['comment']), 
				    'comment_date' => 'Now()',

			  	]);

			}else{

				$error = "Tous les champs doivents être complété!";
				
			}

    	}


        $form = new Form($_POST);

		$id_article = $_GET['id'];

		//Reccuperation de l'article grace a son $id
		$articleManager = new ArticlesManager();
		$article = $articleManager->getArticle($id_article);

  			// if($article === false){

   		// 		App\Cntr::Error();
    
  			// }			

		//Reccuperation des commentaires liés à son article
		$commentsManager = new CommentsManager();
		$comment = $commentsManager->getComments($id_article);


		$adresse_ip = $_SERVER['REMOTE_ADDR'];

		

		require 'App/View/Frontend/ArticleView.php';
