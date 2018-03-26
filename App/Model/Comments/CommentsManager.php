<?php 
namespace App\Model\Comments;

use App\Model\Manager;
use App\Model\Admin\Session;
use PDO; 

class CommentsManager extends Manager{


	/**
	 * Method for display one article by page
	 * @param  [number] $id_article id of article
	 * @return [array]
	 */
	public function getComments($id_article){

		$req = Manager::getDb()->prepare('SELECT id, article_id, comment, pseudo, comment_date FROM comments WHERE article_id = ? ORDER BY comment_date DESC', [$id_article], __CLASS__, true);

		$comments = [];

		foreach($req as $data)
                {
                    $objArticle = new Comments($data);
                    $comments[] = $objArticle;
                }
                
        return $comments;

	}


		/**
	 * Method for whrite new comment at article
	 * @param  [number] $id     [id article]
	 * @param  [datas] $fields [pseudo and text comment]
	 * @return [string]         [register datas in BDD]
	 */
	public function newComment($id, $fields){

		$pseudo = htmlspecialchars($_POST['pseudo']);

        $comment = htmlspecialchars($_POST['comment']);

        $statement = [$id, $pseudo, $comment];
	 	
	 	$req = Manager::getDb()->prepare("INSERT INTO comments(article_id, pseudo, comment, comment_date) VALUES(?, ?, ?, Now())", $statement);


		if($req == true){

			return Session::setFlash('Le commentaire à bien été ajouté', 'success');

			header('Location: http://localhost/php/index.php?p=article&id='. $id .'');
			
		}else{

			return Session::setFlash('Le commentaire n\'a pas été enrgistré', 'danger');

		}

	}

	
	/**
	 * [deleteComment Delete comment]
	 */
	public function deleteComment($id){

	 	$resultOne = Manager::getDb()->prepare("DELETE FROM comments WHERE id = ?", [$id], true);
	 	$resultTwo = Manager::getDb()->prepare("DELETE FROM report_comment WHERE id_report_comment = ?", [$id], true);
	 	if($resultOne && $resultTwo == true){

	 			Session::setFlash('Le commentaire à bien été supprimé', 'success');

              	header("Location: admin.php?p=report");

            }else{

            	Session::setFlash('Le commentaire n\'a pas été supprimé', 'danger');

            }

	}

	/**
	 * ValidateComment | valid comment 
	 */
	public function validateComment($id){

	 	$result = Manager::getDb()->prepare("DELETE FROM report_comment WHERE id_report_comment = ?", [$id], true);
	 	if($result == true){

	 			Session::setFlash('Le commentaire à bien été validé', 'success');

             	header("Location: admin.php?p=report");

            }else{

            	Session::setFlash('Le commentaire n\'a pas été validé', 'danger');

            }

	}

}