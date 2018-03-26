<?php 
use App\Model\Articles\ArticlesManager;

//Paging system

$currentPage = $_GET['id'];

$articleByPage = "10"; 
$start = ($currentPage - 1)* $articleByPage;

//Reccuperation des articles
$articlesManager = new ArticlesManager();
$article = $articlesManager->getArticles($start, $articleByPage);


//Reccuperation du nombre total d'article
$nbTotalArticle = $articlesManager->numberTotalArticle();

$skockeValues = [];

foreach($nbTotalArticle as $valeur){

	$skockeValues[] = "$valeur";

}

$nbArticleTotal = implode(', ',$skockeValues);

//Page total

$pageTotales = ceil($nbArticleTotal/$articleByPage);

require 'App/View/Frontend/AllArticle.php';

