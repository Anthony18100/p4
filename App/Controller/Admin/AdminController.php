<?php 

namespace App\Controller\Admin;

use App\Model\ArticleManager;
use App\Model\CommentManager;


class AdminController{

	public function connection(){

		require 'App/View/admin/connectionView.php';

	}

	public function disconnection(){

		require 'App/View/admin/deco.php';

	}

	public function homeAdmin(){

		$articles = ArticleManager::getArticles('ORDER BY article_date DESC LIMIT 0, 3');

		

		require 'App/View/admin/post/index.php';

	}

	public function article(){

		$comment = CommentManager::getComment();

		require 'App/View/frontend/articleView.php';



	}




}