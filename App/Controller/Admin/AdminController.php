<?php 

namespace App\Controller\Admin;

use App\Model\ArticleManager;
use App\Model\CommentManager;
use App\Model\Manager;

/**
 * Class AdminController 
 *
 * Toutes les vues pour les administrateurs du site
 */

class AdminController{

/**
 * connection()
 *
 * Page de connection des membres
 */

	public function connection(){

		
		require 'App/View/admin/connectionView.php';

	}


/**
 * disconnection()
 * 
 * Page de déconnection membres
 */

	public function disconnection(){

		require 'App/View/admin/signoutView.php';

	}


/**
 * homeAdmin()
 *
 * Page d'accueil des membres
 */

	public function homeAdmin(){

		$articles = ArticleManager::getArticles('ORDER BY article_date DESC LIMIT 0, 3');

		$resulat =  CommentManager::allReportComment();

		$skockeValues = [];

		foreach($resulat as $valeur){

			$skockeValues[] = "$valeur";


		}

		$nb = implode(', ',$skockeValues);

		require 'App/View/admin/post/index.php';

	}

/**
 * edtion()
 *
 * Page d'édition d'article existant et suppression
 */

	public function edition(){

		$article = ArticleManager::getArticle();

  			if($article === false){

   				Manager::Error();
    
  			}			

		$comment = CommentManager::getComment();

		require 'App/View/admin/post/editionView.php';

	}

/**
 * newEdition()
 *
 * Page pour éditer un nouvel article
 */

	public function newEdition(){
		

		require 'App/View/admin/post/newEditionView.php';


	}


/**
 * deleteArticle()
 * 
 * Page de suppression des articles
 */
	public function deleteArticle(){
		

		require 'App/View/admin/post/deleteView.php';


	}

/**
 * reportComment()
 *
 * Page qui liste les commentaires signalés
 */

	public function reportComment(){
		
		$comments = CommentManager::reportCommentAll();

		require 'App/View/admin/post/allcommentView.php';



	}

/**
 * deleteArticle()
 *
 * Suppression du commentaires
 */

	public function deleteComment(){
		

		require 'App/View/admin/post/deleteComView.php';


	}

/**
 * validateComment()
 *
 * Annulation de la mise en suppression du commentaire
 */

	public function validateComment(){
		

		require 'App/View/admin/post/validateCommentView.php';


	}



}