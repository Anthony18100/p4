<!-- Body of the page | Home admin -->

 <div class="bodyPage container mt-3 mb-3">

    <div class="p-2 mt-3"">

      <h2 class="font-weight-bold title-extract text-primary mb-3 text-center">

        Espace d'administration 

      </h2>

    </div>

      <?php

        $session = App\Model\Admin\Session::flash();

      ?>
                    
      <table class="table table-bordered">

        <thead class="thead-dark">
          <tr>
            <th scope="col">Numero</th>

            <th scope="col">Titre</th>

            <th scope="col">Extrait</th>

            <th scope="col">Edition</th>

          </tr>

        </thead>

<!-- Loop foreach to browse articles -->

        <tbody>

          <?php foreach($articles as $article): ?>

          <tr>

            <td><?= $article->getId() ?></td>

            <td><?= $article->getTitle() ?></td>

            <td><?= html_entity_decode($article->getExtrait()); ?></td>

            <td>

              <a href="?p=edition&id=<?= $article->getId() ?>">

                <button type="button" class="btn btn-primary">Editer</button>

              </a>

            </td>

          </tr>

          <?php endforeach; ?>

        </tbody>

      </table>

      <div class="w-100 d-flex justify-content-center">

      <a href="http://localhost/php/admin.php?p=report">

       <button type="button" class="btn btn-warning mr-3">Les commentaires signalés <?= $nb; ?></button>

      </a>

      <a href="http://localhost/php/admin.php?p=newedition">

        <button type="button" class="btn btn-primary mr-3 ml-3">Créer un nouvel article </button>

      </a>

      <a href="http://localhost/php/admin.php?p=disconnection">

        <button type="button" class="btn btn-danger ml-3">Déconnexion</button>

      </a>
      
    </div>

    <div class="d-flex align-items-center">

    <?php 

    for($i = 1; $i <= $pageTotales; $i++){

      if($i == $currentPage){

          echo $i . ' ' ;

      }else{

          echo '<a class="p-1" href="admin.php?p=home&id='. $i .'"> '. $i .' </a>';

      }
         
    }

    ?>

    </div>

  </div>

<!-- End -->