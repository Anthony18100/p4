<?php
session_start();

use App\Model\Articles\ArticlesManager;
use App\Model\Comments\CommentsManager;
use App\Model\Reports\ReportsManager;

$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist(); 

//Systheme of pagination
$currentPage = $_GET['id'];

$articleByPage = "5"; 
$start = ($currentPage - 1)* $articleByPage;

//Reccuperation des articles
$articlesManagers = new ArticlesManager();
$articles = $articlesManagers->getArticles($start, $articleByPage);

//Reccuperation du nombre total d'article
$nbTotalArticle = $articlesManagers->numberTotalArticle();

$skockeValues = [];

foreach($nbTotalArticle as $valeur){

	$skockeValues[] = "$valeur";

}

$nbArticleTotal = implode(', ',$skockeValues);

//Page total
$pageTotales = ceil($nbArticleTotal/$articleByPage);

//Reccuperation des commentaires
$reportsManager = new ReportsManager();
$resulat = $reportsManager->allReportComment();

$skockeValues = [];

foreach($resulat as $valeur){

	$skockeValues[] = "$valeur";


}
$nb = implode(', ',$skockeValues);

// Else $nb = 0 return null else if return number
if($nb === "0"){
	$nb = null;
}else{
 	$nb = "(". $nb .")";
}

require 'App/View/Admin/HomeadminView.php';