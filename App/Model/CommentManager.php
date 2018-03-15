<?php

namespace App\Model;

use App\Cntr;

class CommentManager{

	public static function getComment(){

		return Cntr::getDb()->prepare('SELECT article_id, comment, pseudo, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE article_id = ?', [$_GET['id']], __CLASS__);

	}

}

?>