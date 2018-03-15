<?php $title = 'Accueil | Jean Rochefort'; ?>

      <?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=blog', 'root', 'root'); 
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM clients WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
  header("Location: http://localhost/php/admin.php");
}

        if(isset($_POST)){

           if(!empty($_POST['mailconnect']) AND !empty($_POST['mdpconnect'])) {

            $mailconnect = htmlspecialchars($_POST['mailconnect']);
            $mdpconnect = sha1($_POST['mdpconnect']);

          $auth = new App\Model\Admin\IdentificationManager();
          $auth->login($mailconnect, $mdpconnect);
         
          
        }else{

          $erreur = "Tous les champs doivent être complétés";

        }

      }

   
      
      // $bdd = new PDO('mysql:dbname=blog; host=localhost', 'root', 'root');

    //     if(isset($_POST['formconnexion'])){

    //       $mailconnect = htmlspecialchars($_POST['mailconnect']);
    //       $mdpconnect = sha1($_POST['mdpconnect']);

    //       if(!empty($mailconnect) AND !empty($mdpconnect)) {
    //         $requser = $bdd->prepare("SELECT * FROM members WHERE email = ? AND password = ?");
    //         $requser->execute(array($mailconnect, $mdpconnect));
    //         $userexist = $requser->rowCount();
    //           if($userexist == 1) {
    //            $userinfo = $requser->fetch();
    //            $_SESSION['id'] = $userinfo['id'];
    //             header("Location: admin.php");
        

    //     }else{

    //       $erreur = "Mauvais mail ou mot de passe !";

    //     }




    //   }else{

    //       $erreur = 'Tous les champs doivent être complétés';

    //   }



    // }


        $form = new App\Controller\Form\Form($_POST);

      ?>

<!-- Section | party login form admin-->

    <div class="container mt-5 mb-5 col-xl-3 col-md-5 col-sm-6">

      <div class="text-center mt-3 p-0 mt-xl-5">

        <img src="public/images/icons/page-connection.png" class="img-fluid imageConnection mb-4" alt="Icône espace membre">

        <h2 class="text-primary">Espace de connexion</h2>

      </div>

       <?php

         if(isset($erreur)) {
          echo '<div class="alert alert-danger mt-3 text-center" role="alert">
                  ' . $erreur . '
                </div>';
         }
         ?>

      <form class="mt-4" method="POST">

        <div class="form-group">

          <label for="exampleInputEmail1">Votre adresse mail</label>

          <?= $form->input('email', 'mailconnect', 'Entrer votre email'); ?>

        </div>

        <div class="form-group">

          <label for="exampleInputPassword1">Votre mot de passe</label>

          <?= $form->input('password', 'mdpconnect', 'Entrer votre mot de passe'); ?>

        </div>

        <input type="submit" name="formconnexion" class="btn btn-primary" value="Valider"/>

      </form>

    </div>


