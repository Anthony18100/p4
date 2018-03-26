<?php 

namespace App\Model\Articles;
use App\Model\Manager;
use App\Model\Admin\Session;
use PDO;

class ArticlesManager extends Manager{

 /**
 * Method to retrieve the comment list corresponding to the article by order id desc
 * @return array
 */
	public function getArticles($start, $articleByPage){

		$req =  Manager::getDb()->query('SELECT id, title, content, DATE_FORMAT(article_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY id DESC LIMIT '. $start .', '. $articleByPage .'', __CLASS__, true);

		$articles = [];

		foreach($req as $data)
                {
                    $objArticle = new Articles($data);
                    $articles[] = $objArticle;
                }
                
                return $articles; 

	}


/**
 * number total article
 */

	public function numberTotalArticle(){

		return Manager::getDb()->query('SELECT COUNT(*) as nb FROM articles', __CLASS__, false);

	}


/**
 * Réccuperation de l'article avec la méthode $_GET
 * @return [string] 
 */
	public function getArticle($id_article){

		$req = Manager::getDb()->prepare('SELECT * FROM articles WHERE id = ?', [$id_article], __CLASS__);

		$article = new Articles($req);
                return $article;

	}


/**
 * Update (edit article)
 * @param  [type] $id     [description]
 * @param  [type] $fields [description]
 * @return [type]         [description]
 */
	public function update($id, $fields){

		$sql_parts = [];

		$attributes = [];

		foreach($fields as $k => $v){

			$sql_parts[] = "$k = ?";

			$attributes[] = $v;

		}

		$attributes[] = $id;

		$sql_part = implode(', ',$sql_parts);

	 	$req = Manager::getDb()->prepare("UPDATE articles SET $sql_part WHERE id = ?", $attributes, true);

		if($req === true){

			Session::setFlash('Vos modifications ont bien été enregistré', 'success');
  			
  			header('Location: admin.php?p=home&id=1');

		}else{

			Session::setFlash('Votre article n\' à pas été enregistré', 'danger');

		}

	}


/**
 * createNew Edit new aricle
 * @param  [string] $fields [data]
 */
	public function createNew($fields){

		$title = htmlspecialchars($_POST['title']);

        $content = htmlspecialchars($_POST['content']);

        $statement = [$title, $content];

	 	
	 	$req = Manager::getDb()->prepare("INSERT INTO articles(title, content, article_date) VALUES(?,?, Now())", $statement);


		if($req === true){

			Session::setFlash('Votre nouvelle article à bien été enregistré', 'success');

  			header('Location: admin.php?p=home&id=1');
  			
  			exit;
			
		}else{

			Session::setFlash('Votre article n\' à pas été enregistré', 'danger');

		}

	}


/**
 * [deleteArticle Delete article]
 * @param  [int] $id [id article]
 */
	public function deleteArticle($id){

	 	$result = Manager::getDb()->prepare("DELETE FROM articles WHERE id = ?", [$id], true);

	 	if($result == true){

	 		Session::setFlash('Votre article à bien été supprimé', 'success');

            header("Location: admin.php?p=home&id=1");

        }else{

        	Session::setFlash('Echec de la suppression', 'danger');

        }


	}


}