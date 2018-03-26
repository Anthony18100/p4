<?php 

namespace App\Model\Comments;

class Comments{

	protected $id; 
	protected $article_id; 
	protected $pseudo; 
	protected $comment;
	protected $comment_date; 

	/**
	 * Constructeur of the class qui assigne les données en paramètre $value
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
	 * Méthode Accesseurs (Getters)
	 *
	 * Pour réccuperation et lecture d'un attribut
	 */

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
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->comment_date;
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
        $this->id = $id;

        return $this;
    }

    /**
     * @param mixed $article_id
     *
     * @return self
     */
    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;

        return $this;
    }

    /**
     * @param mixed $pseudo
     *
     * @return self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @param mixed $comment
     *
     * @return self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param mixed $comment_date
     *
     * @return self
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;

        return $this;
    }
}