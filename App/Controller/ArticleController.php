<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Model\CommentManager;


/**
 * class ArticleController
 */
class ArticleController{


/**
 * home()
 *
 * Page d'accueil
 */
	public function home(){

		$articles = ArticleManager::getArticles('ORDER BY article_date DESC LIMIT 0, 3');

		require 'App/View/frontend/homeView.php';

	}

/**
 * article()
 *
 * Reccuperation de l'article correspondant avec $_GET['id']
 */

	public function article(){

		$article = ArticleManager::getArticle();

  			// if($article === false){

   		// 		App\Cntr::Error();
    
  			// }			

		$comment = CommentManager::getComment();	

		require 'App/View/frontend/articleView.php';

	}


/**
 * report()
 *
 * Affichage des commentaire correspond à $_GET['id']
 */
	public function report(){

		$comment = CommentManager::getComment();

		require 'App/View/frontend/reportView.php';

	}



}

