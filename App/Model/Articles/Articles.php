<?php 

namespace App\Model\Articles;

class Articles{
	
	/**
	 * Attributs
	 * 
	 */
	protected $id; 
	public $title; 
	public $content; 
	protected $article_date;

	/**
	 * Constructuer de la class qui assigne les données en paramètre $value
	 * @param array $valeur [description]
	 */
	public function __construct($value = []){
		if(!empty($value)){
			$this->hydrate($value);
		}
	}

	/**
	 * Méthode d'hydratation donnant les valeurs spécifiées aux attributs
	 * @param [type] $datas [description]
	 */
	public function hydrate($datas){

		foreach($datas as $attribut => $value){
			$method = 'set' . ucfirst($attribut);

			if(is_callable([$this, $method])){
				$this->$method($value);
			}
		}

	}


	/**
	 * Methode pour reccuperer l'url, utlisé dans la methode getExtrait()
	 * @return [type] [description]
	 */
	public function getUrl(){

		return 'index.php?p=article&id=' . $this->id;

	}

	/**
	 * Méthode permettant d'afficher l'extrait d'un article
	 * @return [type] [description]
	 */
	public function getExtrait(){

		$html = '<p>' . substr($this->content, 0,  350) . '...</p>';
		$html .= '<p><a href="'. $this->getUrl() . '">Voir la suite</a></p>';
		return $html;

	}

	/**
	 * Methode permettant de savoir si l'article est nouveau
	 * @return boolean 
	 */
	public function isArticle(){

		return empty($this->id);

	}
  	

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getArticleDate()
    {
        return $this->article_date;
    }


    /**
     * Methode Mutatteurs (Setters)
     *
     * Pour modifier la valeur d'un attribut
     */


    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = (int) $id;

        return $this;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
    	if(is_string($title)){
    		$this->title = $title;
    	}
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        if(is_string($content)){
    		$this->content = $content;
    	}
    }

    /**
     * @param mixed $article_date
     *
     * @return self
     */
    public function setArticleDate($article_date)
    {
        $this->article_date = $article_date;
    }

}