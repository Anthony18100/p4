<?php
use App\Controller\Controller;

//Appel de l'autoader
require ('App/Autoloader.php');
App\Autoloader::register();

ob_start();

  try {

  if (isset($_GET['p'])) {

    if ($_GET['p'] === 'home') {

       Controller::home();
       $title ="Jean Forteroche | Accueil";

       }else if($_GET['p'] === 'connection'){

          Controller::connection();
          $title ="Jean Forteroche | Connexion";

      } else if($_GET['p'] === 'article'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          Controller::article();
          $title ="Jean Forteroche | Article";

        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      } else if($_GET['p'] === 'report'){

        if (isset($_GET['id']) && $_GET['id'] > 0){

          Controller::report();
          $title ="Jean Forteroche | Signalement";
          
        }else{

          throw new Exception('Aucun identifiant de billet envoyé');

        }
  
      }

  }else{

    Controller::home();
    $title ="Jean Forteroche | Accueil";
  }

}
catch(Exception $e) {

  echo 'Erreur : ' . $e->getMessage();

}   

$content = ob_get_clean();

require 'App/View/Default.php';   