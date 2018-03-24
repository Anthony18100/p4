<?php
use App\Controller\Controller;

//Appel de l'autoader
require ('App/Autoloader.php');
App\Autoloader::register();

ob_start();

  try {

  if (isset($_GET['p']) AND !empty($_GET['p'])) {

    if ($_GET['p'] === 'home') {

       Controller::home();
       $title ="Jean Forteroche | Accueil";

       }else if($_GET['p'] === 'connection'){

          Controller::connection();
          $title ="Jean Forteroche | Connexion";

      } else if($_GET['p'] === 'article'){

        if (isset($_GET['id']) && !empty($_GET['id']) &&  $_GET['id'] > 0){

          $_GET['id'] = intval($_GET['id']);

          Controller::article();
          $title ="Jean Forteroche | Article";

        }else{

          throw new Exception('Aucun identifiant d\' article envoyé');

        }
  
      } else if($_GET['p'] === 'report'){

        if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0){

          $_GET['id'] = intval($_GET['id']);

          Controller::report();
          $title ="Jean Forteroche | Signalement";
          
        }else{

          throw new Exception('Aucun identifiant de commentaire envoyé');

        }

      }else if($_GET['p'] === 'allarticles'){

        if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0 && $_GET['id']){

          $_GET['id'] = intval($_GET['id']);

          Controller::allArticle();
          $title ="Jean Forteroche Les articles";

        }else{

         throw new Exception('Aucun identifiant de billet envoyé');

        }

      }else{

          throw new Exception('La page demandé n\'existe pas');

        }
  
  }else{

    Controller::home();
    $title ="Jean Forteroche | Accueil";
  }

}
catch(Exception $e) {
  $title ="Jean Forteroche | Erreur 404";
  $errorType =  'Erreur : ' . $e->getMessage();

  App\Model\Manager::errorVisitor($errorType);

}   

$content = ob_get_clean();

require 'App/View/Default.php';   