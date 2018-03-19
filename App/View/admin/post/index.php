<?php
session_start();
$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();

$title = 'Accueil Administration | Jean Rochefort'; 


?>

 <div class="container mt-3 mb-3">

    <div class="p-2 mt-3"">

      <h2 class="font-weight-bold title-extract text-primary mb-3 text-center">

        Espace d'administration 

      </h2>

    </div>
                    
      <table class="table table-bordered">

        <thead class="thead-dark">
          <tr>
            <th scope="col">Numero</th>

            <th scope="col">Titre</th>

            <th scope="col">Extrait</th>

            <th scope="col">Edition</th>

          </tr>

        </thead>

        <tbody>

          <?php foreach($articles as $article): ?>

          <tr>

            <td><?= $article->id ?></td>

            <td><?= $article->title ?></td>

            <td><?= $article->getExtrait() ?></td>

            <td>

              <a href="?p=edition&id=<?= $article->id ?>">

                <button type="button" class="btn btn-primary">Editer</button>

              </a>

            </td>

          </tr>

          <?php endforeach; ?>

        </tbody>

      </table>

      <div class="w-100 d-flex justify-content-center">

      <a href="http://localhost/php/admin.php?p=newedition">

        <button type="button" class="btn btn-primary mr-3">Créer un nouvel article </button>

      </a>

      <a href="http://localhost/php/admin.php?p=disconnection">

        <button type="button" class="btn btn-danger ml-3">Déconnexion</button>

      </a>
      
    </div>

  </div>
