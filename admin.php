<?php
require ('App/Autoloader.php');
App\Autoloader::register();

ob_start();


  try {

  if (isset($_GET['p'])) {

    if ($_GET['p'] === 'home') {

      $controller = new App\Controller\Admin\AdminController();

      $controller->homeAdmin();

      }else if ($_GET['p'] === 'report') {

      $controller = new App\Controller\Admin\AdminController();

      $controller->reportComment();

      } else if($_GET['p'] === 'edition'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          $controller = new App\Controller\Admin\AdminController();

          $controller->edition();

        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      }else if($_GET['p'] === 'connection'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->connection();

      }else if($_GET['p'] === 'disconnection'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->disconnection();

      }else if($_GET['p'] === 'newedition'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->newEdition();

      }else if($_GET['p'] === 'delete'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->deleteArticle();

      }else if($_GET['p'] === 'deletecom'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->deleteComment();

      }else if($_GET['p'] === 'validatecom'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->validateComment();

      }

  }else{

      $controller = new App\Controller\Admin\AdminController();

      $controller->homeAdmin();

  }

}
catch(Exception $e) {

  echo 'Erreur : ' . $e->getMessage();

}

$content = ob_get_clean();

require 'App/View/frontend/default.php';   

