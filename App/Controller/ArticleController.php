<?php

namespace App\Controller;

use App\Model\ArticleManager;
use App\Model\CommentManager;



class ArticleController{

	public function home(){

		$articles = ArticleManager::getArticles('ORDER BY article_date DESC LIMIT 0, 3');

		require 'App/View/frontend/homeView.php';

	}

	public function article(){

		$article = ArticleManager::getArticle();

  			if($article === false){

   				App\Cntr::Error();
    
  			}			

		$comment = CommentManager::getComment();

		require 'App/View/frontend/articleView.php';


	}


}

