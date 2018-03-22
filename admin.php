<?php
use App\Controller\Controller;

require ('App/Autoloader.php');
App\Autoloader::register();

ob_start();


  try {

  if (isset($_GET['p'])) {

    if ($_GET['p'] === 'home') {

      Controller::homeAdmin();

      }else if ($_GET['p'] === 'report') {

        Controller::reportComment();

      } else if($_GET['p'] === 'edition'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          Controller::edition();

        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      }else if($_GET['p'] === 'disconnection'){

          Controller::disconnection();

      }else if($_GET['p'] === 'newedition'){

          Controller::newEdition();

      }else if($_GET['p'] === 'delete'){

          Controller::deleteArticle();

      }else if($_GET['p'] === 'deletecom'){

          Controller::deleteComment();

      }else if($_GET['p'] === 'validatecom'){

          Controller::validateComment();

      }

  }else{

      Controller::homeAdmin();

  }

}
catch(Exception $e) {

  echo 'Erreur : ' . $e->getMessage();

}

$content = ob_get_clean();

require 'App/View/Default.php';   

