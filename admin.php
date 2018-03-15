<?php
require ('App/Autoloader.php');
App\Autoloader::register();

ob_start();


  try {

  if (isset($_GET['p'])) {

    if ($_GET['p'] === 'home') {

      $controller = new App\Controller\Admin\AdminController();

      $controller->homeAdmin();


      } else if($_GET['p'] === 'article'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          

        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      }else if($_GET['p'] === 'connection'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->connection();

      }else if($_GET['p'] === 'disconnection'){

          $controller = new App\Controller\Admin\AdminController();

          $controller->disconnection();

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

