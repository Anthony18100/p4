<?php 
session_start();
use App\Model\Articles\ArticlesManager;
$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();

    if(!empty($_POST)){

       	$articlesManagers = new ArticlesManager();
        $result = $articlesManagers->deleteArticle($_POST['id']);

        if($result == true){

        	echo 'ok';

        }

    }

require 'App/View/admin/post/deleteView.php';