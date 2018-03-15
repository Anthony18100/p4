<?php

namespace App\Model;

use App\Cntr;


class ArticleManager{

//Reccuperation de plusieurs articles 
	
	public static function getArticles($addCondition){

		return Cntr::getDb()->query('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ' . $addCondition . '', __CLASS__);

	}

//Reccuperation d'un article par page avec getId

	public static function getArticle(){

		return Cntr::getDb()->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], __CLASS__ , true);

	}


	public function getUrl(){

		return 'index.php?p=article&id=' . $this->id;

	}


	public function getExtrait(){

		$html = '<p>' . substr($this->content, 0,  100) . '...</p>';
		$html .= '<p><a href="'. $this->getUrl() . '">Voir la suite</a></p>';
		return $html;

	}


}

