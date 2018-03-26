<!-- Body of the page | Article edition -->

    <div class="container mb-5">

      <div class="text-center mt-3 p-0 mt-xl-5">

        <h2 class="text-primary">Partie édition</h2>

      </div>

          <?php

         if(isset($error)) {
          echo '<div class="alert alert-danger mt-3 text-center" role="alert">
                  ' . $error . '
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

          <?= $form->textarea('text', 'content', 'tinymce', 'Entrer votre texte'); ?>

        </div>

        <div class="w-100 d-flex justify-content-center">

          <?= $form->button('submit', 'btn btn-primary', 'formArticle', 'Soumettre'); ?>
      
        </div>

      </form>

        <div class=" mt-2">

         <form method="POST" action="http://localhost/php/admin.php?p=delete&id=<?= $article->getId(); ?>">

              <input type="hidden" name="id" value="<?= $article->getId(); ?>">

              <div class="w-100 d-flex justify-content-around">
              
                <?= $form->button('submit', 'btn btn-danger', 'delete', 'Supprimer'); ?>

                <a href="admin.php?p=home&id=1">

                   <button type="button" class="btn btn-danger">Annuler</button>
   
                </a>

              </div>

        </form>

      </div>

  </div>

<!-- End -->