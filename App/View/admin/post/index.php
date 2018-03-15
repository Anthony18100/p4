<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=blog', 'root', 'root');

if($_SESSION['id'] == null) {
  header('Location: http://localhost/php/admin.php?p=connection');
}else{

  echo "bienvenue";

}



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

    </div>



