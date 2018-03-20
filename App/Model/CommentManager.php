<?php

namespace App\Model;

/**
 * Class CommentManager()
 *
 * Gère les commentaires
 */
class CommentManager extends Manager{

	public static function getComment(){

		return Manager::getDb()->prepare('SELECT id, article_id, comment, pseudo, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE article_id = ?', [$_GET['id']], __CLASS__, true);

	}



	public function getReportComment($idComment){

		$statement = [$idComment];

		$nb = Manager::getDb()->query('SELECT * FROM report_comment WHERE id_report_comment = ?', $statement,  __CLASS__, true);
		

	}


	public function allReportComment(){

		return Manager::getDb()->query('SELECT COUNT(*) as nb FROM report_comment', __CLASS__, false);


	}

/**
 * ReportCommentAll
 *
 * Réccuperation de touts les commentaires signalés
 */

	public static function reportCommentAll(){

		return Manager::getDb()->query("
			SELECT comments.id, pseudo, comment, DATE_FORMAT(comments.comment_date, \"%d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr
			FROM comments
			INNER JOIN report_comment ON comments.id = report_comment.id_report_comment", 
			__CLASS__, true);

	}

	/**
 * [newComment description]
 * @param  [type] $id     [description]
 * @param  [type] $fields [description]
 * @return [type]         [description]
 */
	public function newComment($id, $fields){

		$pseudo = htmlspecialchars($_POST['pseudo']);

        $comment = htmlspecialchars($_POST['comment']);

        $statement = [$id, $pseudo, $comment];
	 	
	 	$test = Manager::getDb()->prepare("INSERT INTO comments(article_id, pseudo, comment, comment_date) VALUES(?, ?, ?, Now())", $statement);


		if($test === true){

			header('Location: '. $_SERVER['HTTP_REFERER'] .'');
			
		}else{

			echo 'error';

		}

	}

/**
 * [reportComment description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	public function reportComment($id){

	 	$result = Manager::getDb()->prepare("INSERT INTO report_comment(id_report_comment, date_report_comment) VALUES (?, Now())", [$id]);

	 	if($result == true){

             header('Location: '. $_SERVER['HTTP_REFERER'] .'');

            }else{

            	echo 'problemo amigo!';

            }

	}

/**
 * [deleteComment Suppresion du commantaire]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	public function deleteComment($id){

	 	$resultOne = Manager::getDb()->prepare("DELETE FROM comments WHERE id = ?", [$id], true);
	 	$resultTwo = Manager::getDb()->prepare("DELETE FROM report_comment WHERE id_report_comment = ?", [$id], true);
	 	if($resultOne && $resultTwo == true){

              header("Location: http://localhost/php/admin.php?p=report");

            }

	}

	public function validateComment($id){

	 	$result = Manager::getDb()->prepare("DELETE FROM report_comment WHERE id_report_comment = ?", [$id], true);
	 	if($result == true){

              header("Location: http://localhost/php/admin.php?p=report");

            }

	}




}

?>