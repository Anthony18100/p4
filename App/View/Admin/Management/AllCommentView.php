<!-- Body of the page | Posted comments posted -->

<div class="bodyPage container mt-3 mb-3">

    <div class="p-2 mt-3"">

      <h2 class="font-weight-bold title-extract text-primary mb-3 text-center">

        Espace commentaires

      </h2>

    </div>

     <?php

          $session = App\Model\Admin\Session::flash();

          if(isset($resultReport)) {
            echo '<div class="alert alert-primary mt-3 text-center" role="alert">
                  ' . $resultReport . '
                </div>';
          }else{

      ?>
                    
      <table class="table table-bordered">

        <thead class="thead-dark">

          <tr>

            <th scope="col">Nombre de signalement</th>

            <th scope="col">Pseudo</th>

            <th scope="col">Commentaire</th>

            <th scope="col">Supprimer</th>

            <th scope="col">Valider</th>

          </tr>

        </thead>

        <tbody>

<!-- Loop foreach to browse all comments posted -->

          <?php foreach($comments as $comment): 

              // Reccuperation du nombre de signalement par commentaire
              $nb = $comment->getid(); 
              $nbReportByComment = App\Model\Reports\ReportsManager::numberReportByComment($nb);
              $skockeValues = [];

              foreach($nbReportByComment as $valeur){

                $skockeValues[] = "$valeur";


              }

              $nbReport = implode(', ',$skockeValues);

          ?>

          <tr>

            <td><?= $nbReport ?></td>

            <td><?= $comment->getPseudo() ?></td>

            <td><?= $comment->getComment() ?></td>

            <td>

              <?php $form = new App\Controller\Form\Form($_POST); ?>

              <form method="POST" action="admin.php?p=deletecom&id=<?= $comment->getId() ?>">

                <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                
                <?= $form->button('submit', 'btn btn-danger ml-3', 'delete', 'Supprimer'); ?>

              </form>

            </td>

            <td>
              
               <form method="POST" action="admin.php?p=validatecom&id=<?= $comment->getId() ?>">

                <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                
                <?= $form->button('submit', 'btn btn-success ml-3', 'validate', 'Valider'); ?>

              </form>

            </td>

          </tr>

          <?php endforeach; ?>

        </tbody>

      </table>

      <?php 

        }

      ?>

      <div class="cntr_btn w-100 d-flex justify-content-center">

        <a href="admin.php?p=home&id=1">

          <button type="button" class="btn btn-primary mr-3 ml-3">Accueil</button>

        </a>

        <a href="admin.php?p=newedition">

          <button type="button" class="btn btn-primary mr-3 ml-3">Créer un nouvel article </button>

        </a>

        <a href="admin.php?p=disconnection">

          <button type="button" class="btn btn-danger ml-3">Déconnexion</button>

        </a>
      
      </div>

  </div>

<!-- End -->