<!-- Body of the page | Article display -->

 <div class="container mt-3 mb-3">

  <div class="w-100 d-flex justify-content-center">
  
  </div>

    <div class="p-2  mt-3"">

      <h2 class="font-weight-bold title-extract text-primary mb-3 text-center">

        <?= $article->getTitle(); ?>  

      </h2>
                  
      <div class="text-extract">

        <?=  html_entity_decode($article->getContent()); ?>

      </div>
      
    </div>

    <div id="titleComment" class="pt-3 pb-3">

      <h3 class="text-center text-primary pb-3">Les commentaires</h3>

      <div class="d-flex align-items-center flex-column">
        
        <?php  $session = App\Model\Admin\Session::flash(); ?>

      </div>

<!-- Foreach loop to display comments -->
<!-- Method to find out if a user has already posted a comment -->
<?php 

if(isset($error)) {
    echo '<div class="alert alert-danger mt-3 text-center" role="alert">
            ' . $error . '
          </div>';
  }

foreach($comment as $comments): 

$id_report = intval($comments->getId());

$resulat = App\Model\Reports\ReportsManager::sayReport($id_report, $adresse_ip);

?>


      <div class="border-top border-success p-2">

        <p><span class="text-primary">De: <?= $comments->getPseudo(); ?></span></p>

         <p> <?= $comments->getComment(); ?></p>

<?php

if($resulat == true){

  echo '<button class="btn btn-success">Le commentaire à bien été signalé</button>';

}else{

?>

      <form method="POST" action="http://localhost/php/index.php?p=report&id=<?= $comments->getId(); ?>/#titleComment">

            <input type="hidden" name="id" value="<?= $comments->getId(); ?>">
            
            <button class="btn btn-danger" type="submit">Signaler</button>

      </form>

<?php 

}

?>

      </div>  

<?php 

endforeach;

?>

      <div class="cntr-message p-3 mt-5">

       <form method="POST" action="#titleComment">

        <div class="form-group">

          <?= $form->label('pseudo', 'Votre pseudo'); ?>

          <?= $form->input('text', 'pseudo', 'Saisissez votre pseudo'); ?>

        </div> 

        <div class="form-group">

          <?= $form->label('comment', 'Votre commentaire'); ?>

          <?= $form->textarea('text', 'comment', '', 'Entrer votre commentaire'); ?>

        </div>

        <div class="w-100 d-flex justify-content-center">

          <?= $form->button('submit', 'btn btn-primary mr-3', 'formArticle', 'Soumettre'); ?>

        </div>

      </form>

    </div>

  </div>

</div>

<!-- End -->