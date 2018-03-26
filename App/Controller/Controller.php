<?php

namespace App\Controller;

use App\Model\Articles\ArticlesManager;
use App\Model\Comments\CommentsManager;
use App\Model\CommentManager;


/**
 * class ArticleController
 * Chargement des vues et des fonctionnalitées à apporter sur une page
 */

class Controller{

	/**
	 * *******************Part I************************ 
	 *
	 * ***************Method for the vistors************ 
	 * 
	 * 
	 * home()
	 * Controller for page home (homeView.php)
	 */
	
	public static function home(){ include_once 'Visitor/Home.php';} 


	/**
	 * article()
	 *
	 * Contoller for single page article (activeView.php)
	 */

	public static function article(){ include_once 'Visitor/Article.php'; }


	/**
	 * allArticle()
	 *
	 * Listing all articles
	 */

	public static function allArticle(){ include_once 'Visitor/AllArticle.php'; }


	/**
	 * report()
	 *
	 * Controller for report comment (reportView.php)
	 */
	
	public static function report(){ include_once 'Visitor/Report.php'; }


	/**
	 * connection()
	 *
	 * Page for connection members (connectionView.php)
	 */
	
	public static function connection(){ include_once 'Visitor/Connection.php'; }


	/**
	 ********************Part II*************************
	 *
	 ***************Method for the members***************
	 *
	 *disconnection()
	 *
	 * Controller for disconnection SESSION members (SignoutVieux.php)
	 */
	
	public static function disconnection(){ include_once 'Admin/Disconnection.php'; }


	/**
	 * homeAdmin()
	 *
	 *Controller for page home the members (HomeadminView.php)
	 */
	
	public static function homeAdmin(){ include_once 'Admin/Homeadmin.php'; }


	/**
	 * edition()
	 *
	 * Controller for edition or delete article (EditionView.php)
	 */

	public static function edition(){ include_once 'Admin/Management/Edition.php'; }


	/**
	 * newEdition()
	 *
	 * Controller for new edtion article (NewEditionView.php)
	 */

	public static function newEdition(){ include_once 'Admin/Management/NewEdition.php'; }


	/**
	 * deleteArticle()
	 *
	 * Controller for deleteArticle (DeleteArticleView.php)
	 */

	public static function deleteArticle(){ include_once 'Admin/Management/DeleteArticle.php'; }


	/**
	 * reportComment()
	 *
	 * Controller why list the comments reports (AllCommentView.php)
	 */

	public static function reportComment(){ include_once 'Admin/Management/ReportComment.php'; }


	/**
	 * validateComment()
	 *
	 * Valide comment (ValidateCommentView.php)
	 */

	public static function validateComment(){ include_once 'Admin/Management/ValidateComment.php'; }


	/**
	 * delecomment()
	 *
	 * Delete comment (DeleteComView.php)
	 */

	public static function deleteComment(){ include_once 'Admin/Management/DeleteComment.php'; }




}

