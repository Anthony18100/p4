<?php

namespace App\Model;


class ArticleManager extends Manager{


//Reccuperation de plusieurs articles 	
	public static function getArticles($addCondition){

		return Manager::getDb()->query('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ' . $addCondition . '', __CLASS__);

	}


//Reccuperation d'un article par page avec getId
	public static function getArticle(){

		return Manager::getDb()->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], __CLASS__ );

	}


	public function update($id, $fields){

		$sql_parts = [];

		$attributes = [];

		foreach($fields as $k => $v){

			$sql_parts[] = "$k = ?";

			$attributes[] = $v;

		}

		$attributes[] = $id;

		$sql_part = implode(', ',$sql_parts);

	 	$test = Manager::getDb()->prepare("UPDATE articles SET $sql_part WHERE id = ?", $attributes, true);

		if($test === true){

			header('http://localhost/php/admin.php?p=home');
  			exit;

		}else{

			echo 'error';

		}

	}

	public function createNew($fields){

		$title = htmlspecialchars($_POST['title']);

        $content = htmlspecialchars($_POST['content']);

        $statement = [$title, $content];

	 	
	 	$test = Manager::getDb()->prepare("INSERT INTO articles(title, content, article_date) VALUES(?,?, Now())", $statement);


		if($test === true){

			header('http://localhost/php/admin.php?p=home');
  			exit;
			
		}else{

			echo 'error';

		}

	}

	public function deleteArticle($id){

	 	$result = Manager::getDb()->prepare("DELETE FROM articles WHERE id = ?", [$id], true);

	 	if($result == true){

              header("Location: http://localhost/php/admin.php?p=home");

            }

	}

	// public function lastArticleId(){

	// 	return Manager::getDb()->lastArticleId();

	// }


//Fonction pour reccuperer l'id de l'article
	public function getUrl(){

		return 'index.php?p=article&id=' . $this->id;

	}


//Fonction pour afficher extrait d'un article
	public function getExtrait(){

		$html = '<p>' . substr($this->content, 0,  100) . '...</p>';
		$html .= '<p><a href="'. $this->getUrl() . '">Voir la suite</a></p>';
		return $html;

	}


}

