<?php 

use App\Model\Articles\ArticlesManager;

$articlesManager = new ArticlesManager();
$articles = $articlesManager->getArticles(0, 3);


include_once 'App/View/Frontend/HomeView.php';
