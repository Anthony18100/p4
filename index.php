<?php

// require ('controller/frontend.php');

require ('App/Autoloader.php');
App\Autoloader::register();


ob_start();

  try {

  if (isset($_GET['p'])) {

    if ($_GET['p'] === 'home') {

      $controller = new App\Controller\ArticleController();

      $controller->home();

      } else if($_GET['p'] === 'article'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          $controller = new App\Controller\ArticleController();

          $controller->article();

        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      } else if($_GET['p'] === 'report'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          $controller = new App\Controller\ArticleController();

          $controller->report();

        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      }

  }else{

     $controller = new App\Controller\ArticleController();

      $controller->home();

  }

}
catch(Exception $e) {

  echo 'Erreur : ' . $e->getMessage();

}   

$content = ob_get_clean();

require 'App/View/frontend/default.php';   