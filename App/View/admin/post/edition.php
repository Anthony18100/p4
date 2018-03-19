<?php
session_start();
$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();

$title = 'Edition | Jean Rochefort'; 

        if(!empty($_POST)){

            $result = $article->update($_GET['id'], [

              'title' => $_POST['title'],
              'content' => $_POST['content']

            ]);

        }

        $post = $article;

        $form = new App\Controller\Form\Form($post);

?>

<!-- Section | party login form admin-->

    <div class="container mb-5">

      <div class="text-center mt-3 p-0 mt-xl-5">

        <h2 class="text-primary">Partie édition</h2>

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

          <?= $form->label('title', 'Votre titre'); ?>

          <?= $form->input('text', 'title', 'Saisissez votre titre'); ?>

        </div>

        <div class="form-group">

          <?= $form->label('content', 'Votre article'); ?>

          <?= $form->textarea('text', 'content', 'Entrer votre texte'); ?>

        </div>

        <div class="w-100 d-flex justify-content-center">

          <?= $form->button('submit', 'btn btn-primary mr-3', 'formArticle', 'Soumettre'); ?>
      
        </div>

      </form>

       <form method="POST" action="http://localhost/php/admin.php?p=delete&id=<?= $post->id; ?>">

            <input type="hidden" name="id" value="<?= $post->id; ?>">
            
            <?= $form->button('submit', 'btn btn-danger ml-3', 'delete', 'Supprimer'); ?>

      </form>

    </div>


