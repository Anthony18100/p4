<?php

namespace App\Model;

class CommentManager extends Manager{

	public static function getComment(){

		return Manager::getDb()->prepare('SELECT article_id, comment, pseudo, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE article_id = ?', [$_GET['id']], __CLASS__, true);

	}


	

}

?>