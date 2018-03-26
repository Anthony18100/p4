<?php 
namespace App\Model\Reports;

use App\Model\Admin\Session;
use App\Model\Comments\Comments;
use App\Model\Manager;

class ReportsManager extends Manager{

	/**
	 * getReportComment
	 * @param $idComment, This method allows of reporting comment thanks $idComments
	 */
	public function getReportComment($idComment){

		$statement = [$idComment];

		return Manager::getDb()->query("SELECT * FROM report_comment WHERE id_report_comment = ?", $statement,  __CLASS__, true);
		
	}


	/**
	 * allReportComment()
	 * @return Method to count the total number of commented comments that are untreated
	 */
	public function allReportComment(){

		return Manager::getDb()->query('SELECT COUNT(*) as nb FROM report_comment', __CLASS__, false);


	}	


	/**
	 * Méthode pour compter le nombre de signalement sur un commentaire (non utilisé)
	 */
	public static function numberReportByComment($id){

		return Manager::getDb()->query('SELECT COUNT(*) as nbReport FROM report_comment WHERE id_report_comment = ' . $id .'', __CLASS__, false);


	}


	/**
	 * sayRepport | Method to know if the user has already posted a comment
	 * @param  [int] $id_report  [id comment]
	 * @param  [string] $adresse_ip [ip adress the user]
	 * @return [bool]
	 */
	public static function sayReport($id_report, $adresse_ip){

		$statement = [$adresse_ip, $id_report];

		return Manager::getDb()->prepare('SELECT * FROM report_comment WHERE adress_ip = ? AND id_report_comment = ? ', $statement,  __CLASS__, true);


	}


	/**
	 * reportCommentAll Show all comments posted
	 * @return [array] retourn the datas
	 */
	public static function reportCommentAll(){

		$req =  Manager::getDb()->query("
			SELECT DISTINCT comments.id, pseudo, comment, DATE_FORMAT(comments.comment_date, \"%d/%m/%Y à %Hh%imin%ss\") AS creation_date_fr
			FROM comments
			INNER JOIN report_comment ON comments.id = report_comment.id_report_comment", 
			__CLASS__, true);


		$comments = [];

		foreach($req as $data)
                {
                    $objArticle = new Comments($data);
                    $comments[] = $objArticle;
                }
                
        return $comments;


	}


	/**
	 * reportComment Commenting a comment by user
	 */
	public function reportComment($statement){

		$adresse_ip = $_SERVER['REMOTE_ADDR'];

		$id_report = intval($_POST['id']);

		$statement = [$adresse_ip, $id_report];

	 	$result = Manager::getDb()->prepare("INSERT INTO report_comment(adress_ip, id_report_comment, date_report_comment) 
	 		VALUES (?, ?, Now())", $statement);

	 	if($result == true){

             	header('Location: '. $_SERVER['HTTP_REFERER'] .'');

            }else{

            	Session::setFlash('Le commentaire n\' a pas été validé', 'danger');

            }

	}


}