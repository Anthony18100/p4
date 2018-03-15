<?php

// require_once('Model/ArticleManager.php');


// //Home page 
// function homePage(){

// 	$articleManager = new \Ag\Blog\Rochefort\ArticleManager();
// 	$article = $articleManager->getArticles();
// 	require ('view/frontend/homeView.php');

// }


// //Article page
// function articlePage(){

// 	$articleManager = new \Ag\Blog\Rochefort\ArticleManager();
// 	$recoverArticle = $articleManager-> getArticle($_GET['id']);

// 	$commentArticle = new \Ag\Blog\Rochefort\ArticleManager();
// 	$comments = $commentArticle-> getComments($_GET['id']);

// 	require ('view/frontend/articleView.php');

// }