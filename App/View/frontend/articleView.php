<?php $title = 'Accueil | Jean Rochefort'; ?>


<?php 
$article = App\Model\ArticleManager::getArticle();
  if($article === false){

    App\Cntr::Error();
    
  }
?>


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

<?php 

foreach($comment as $comments):


?>


      <div class="border-top border-success pt-2">

        <p><span class="text-primary">De: <?= $comments->pseudo ?></span></p>

        <p> <?= $comments->comment ?></p>

        <p><span class="text-primary">Le: <?= $comments->creation_date_fr ?></span></p>

      </div>  



<?php endforeach; ?>

  </div>

</div>


