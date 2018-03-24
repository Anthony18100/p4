<?php
use App\Controller\Controller;

require ('App/Autoloader.php');
App\Autoloader::register();

ob_start();


  try {

  if (isset($_GET['p'])) {

    if ($_GET['p'] === 'home') {

      if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0 && $_GET['id']){

        $_GET['id'] = intval($_GET['id']);

        $title ="Jean Forteroche | Accueil administrateur"; 
        Controller::homeAdmin();

      }else{

        throw new Exception('Aucun identifiant de billet envoyé');

      }

      }else if ($_GET['p'] === 'report') {

        $title ="Jean Forteroche | Signalement";
        Controller::reportComment();

      } else if($_GET['p'] === 'edition'){

        if (isset($_GET['id']) && $_GET['id'] > 0){
          
          $_GET['id'] = intval($_GET['id']);

          $title ="Jean Forteroche | Edition article";
          Controller::edition();

        }else{

          throw new Exception('Aucun identifiant d\'article envoyé');

        }
  
      }else if($_GET['p'] === 'disconnection'){

          $title ="Jean Forteroche | Déconnexion";
          Controller::disconnection();

      }else if($_GET['p'] === 'newedition'){

          $title ="Jean Forteroche | Edition nouvel article";
          Controller::newEdition();

      }else if($_GET['p'] === 'delete'){

          $title ="Jean Forteroche | Supression article";
          Controller::deleteArticle();

      }else if($_GET['p'] === 'deletecom'){

          $title ="Jean Forteroche | Supression commentaire";
          Controller::deleteComment();

      }else if($_GET['p'] === 'validatecom'){

          $title ="Jean Forteroche | Validation commentaire";
          Controller::validateComment();

      }

  }else{

      Controller::homeAdmin();

  }

}
catch(Exception $e) {

  $title ="Jean Forteroche | Erreur 404";
  $errorType =  'Erreur : ' . $e->getMessage();

  App\Model\Manager::errorAdmin($errorType);

}

$content = ob_get_clean();

require 'App/View/Default.php';   

