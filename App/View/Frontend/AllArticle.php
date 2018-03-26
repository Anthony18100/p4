<!-- Body of the page | Display all articles -->

 <div class="bodyPage container mt-3 mb-3">

  <div class="p-2  mt-3">

<?php foreach($article as $articles): ?>


      <h2 class="font-weight-bold title-extract text-primary mb-3 text-center">
        <?=  html_entity_decode($articles->getTitle()); ?>  
      </h2>
                  
      <p class="text-extract text-left">
        <?= html_entity_decode($articles->getExtrait()); ?>
      </p>

    </div>

<?php endforeach; ?>

<!-- Paging method -->

<div class="d-flex align-items-center">

    <?php 

    for($i = 1; $i <= $pageTotales; $i++){

      if($i == $currentPage){

          echo $i . ' ' ;

      }else{

          echo '<a class="p-1" href="index.php?p=allarticles&id='. $i .'"> '. $i .' </a>';

      }
         
    }

    ?>

    </div>

</div>



<!-- End -->