<?php 

namespace App\Controller\Admin;

use App\Model\ArticleManager;
use App\Model\CommentManager;
use App\Model\Manager;

// Class AdminController who controle the pages for members

class AdminController{

//Page of connection for members

	public function connection(){

		
		require 'App/View/admin/connectionView.php';

	}


//Page for destroy the session

	public function disconnection(){

		require 'App/View/admin/deco.php';

	}


//Page home for the members

	public function homeAdmin(){

		$articles = ArticleManager::getArticles('ORDER BY article_date DESC LIMIT 0, 3');

		

		require 'App/View/admin/post/index.php';

	}

//Page for edit or delete article existing

	public function edition(){

		$article = ArticleManager::getArticle();

  			if($article === false){

   				Manager::Error();
    
  			}			

		$comment = CommentManager::getComment();

		require 'App/View/admin/post/edition.php';

	}

//Page for create new article	

	public function newEdition(){
		

		require 'App/View/admin/post/newEditionView.php';


	}


	public function deleteArticle(){
		

		require 'App/View/admin/post/deleteView.php';


	}


}