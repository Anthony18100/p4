<?php $title = 'Accueil | Jean Rochefort'; ?>


<!-- Image home page and title h1 -->

 <div class="container mt-3 mb-3">

    <div class="p-2  mt-3"">

      <h2 class="font-weight-bold title-extract text-primary mb-3 text-center">
        <?= $article->title; ?>  
      </h2>
                  
      <p class="text-extract">
        <?= $article->content; ?>
      </p>

    </div>

    <div class="border-top border-success pt-3 pb-3">

      <h3 class="text-center text-primary pb-3">Les commentaires</h3>

<?php foreach($comment as $comments): ?>

      <div class="border-top border-success pt-2">

        <p><span class="text-primary">De: <?= $comments->pseudo ?></span></p>

        <p> <?= $comments->comment ?></p>

        <p><span class="text-primary">Le: <?= $comments->creation_date_fr ?></span></p>





<?php 

$bdd = new PDO('mysql:dbname=blog; host=localhost', 'root', 'root');

$nb = $bdd->prepare('SELECT * FROM report_comment WHERE id_report_comment = ?');
        $nb->execute(array($comments->id));
        $nb = $nb->rowCount();


?>
      
      <form method="POST" action="http://localhost/php/index.php?p=report&id=<?= $comments->id; ?>">

            <input type="hidden" name="id" value="<?= $comments->id; ?>">
            
            <button class="btn btn-danger" type="submit">Signaler (<?= $nb; ?>)</button>

      </form>


      </div>  

<?php endforeach; ?>

<?php 

  if(!empty($_POST)){

    $result = App\Model\CommentManager::newComment($_GET['id'],[
      'pseudo' => $_POST['pseudo'],
      'comment' => $_POST['comment'], 
      'comment_date' => 'Now()',

      ]);

    }


        $form = new App\Controller\Form\Form($_POST);

?>


       <form class="mt-4" method="POST" action="">

        <div class="form-group">

          <?= $form->label('pseudo', 'Votre pseudo'); ?>

          <?= $form->input('text', 'pseudo', 'Saisissez votre pseudo'); ?>

        </div>

        <div class="form-group">

          <?= $form->label('comment', 'Votre commentaire'); ?>

          <?= $form->textarea('text', 'comment', 'Entrer votre commentaire'); ?>

        </div>

        <div class="w-100 d-flex justify-content-center">

          <?= $form->button('submit', 'btn btn-primary mr-3', 'formArticle', 'Soumettre'); ?>

        </div>

      </form>

  </div>

</div>


