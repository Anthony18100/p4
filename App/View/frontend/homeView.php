<!-- Image home page and title h1 -->

  <div class="container mt-4 mt-xl-5">

    <header class="p-0 bg-white">

      <img src="public/images/alaska.jpg" class="img-fluid" alt="Paysage de l'Alaska">

      <div class="text-center mt-3 p-0 mt-xl-5">

        <h2 class="text-primary">Bienvenue sur le blog de Jean Forteroche</h2>

      </div>

    </header>

<!-- Section paragraph-->

        <section class="container col-xl-10 col-md-10 mt-xl-5 mt-4 justify-content-centermt-xl-5">

          <p class="badScript">Découvrez mon nouveau livre "<strong>Billet simple pour l'Alaska</strong>", mon nouvel oeuvre est actuellement en création je publierais des épisodes direment sur mon blog. Grâce à cette inovation, vous pourrez lire, partager et commenter mes dernières créations. Bonne lecture à vous =)</p>

          <p class="badScript text-left ml-3">J.Forteroche</p>

        </section>

        <section class="mt-5">

          <div class="text-center mt-3 p-0 mt-xl-5">

            <h2 class="text-primary">Découvrez les derniers articles</h2>

          </div>

          <div class="d-flex  flex-wrap justify-content-center mb-4 mt-xl-5 mt-4">

<?php 

foreach($articles as $article): 

?>

            <div class="border border-success p-2  m-3" style="max-width: 300px">

                <p class="title-extract">
                    <?= $article->title; ?>  
                </p>
                  
              <p class="text-extract">
                 <?= $article->getExtrait(); ?>
              </p>

             </div>


<?php endforeach; ?>

          </div>

        </div>


<?php 
