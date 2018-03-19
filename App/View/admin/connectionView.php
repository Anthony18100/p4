<?php 
session_start();

$restrictionAdmin = new App\Model\Admin\IdentificationManager();
$restrictionAdmin->restrictionAdmin();

        
      if(isset($_POST['formConnection'])){

        $auth = new App\Model\Admin\IdentificationManager();
        if($auth->login($_POST['email'], $_POST['password'])){

          header("Location: admin.php");
          exit;

        }

      }

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

          <?= $form->label('email', 'Votre adresse mail'); ?>

          <?= $form->input('email',  'email', 'Entrer votre email'); ?>

        </div>

        <div class="form-group">

          <?= $form->label('password', 'Votre mot de passe'); ?>

          <?= $form->input('password',  'password', 'Entrer votre mot de passe'); ?>

        </div>

        <input type="submit" name="formConnection" class="btn btn-primary" value="Valider"/>

      </form>

    </div>


