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

      </div>  

<?php endforeach; ?>

<?php 

  if(!empty($_POST)){

    $result = ArticleManager::newComment([

      'title' => $_POST['title'],
      'content' => $_POST['content'], 
      'article_date' => 'Now()',

      ]);

    }


        $form = new App\Controller\Form\Form($_POST);

?>


       <form class="mt-4" method="POST" action="">

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

  </div>

</div>


