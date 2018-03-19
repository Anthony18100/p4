<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
<!-- Cdn bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
<!-- Font family cdn google -->
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
<!-- Cdn fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
  </head>
  <body>

<!-- Header -->
  
  <nav class="navbar navbar-fixed-bottom navabar-dark bg-primary align-items-center">

    <h1 class="my-0 pr-0 font-weight-normal text-light"><a>Jean Forteroche</a></h1>

      <ul class="my-2 my-md-3 mr-md-3 pl-0 d-flex justify-content-sm-between align-items-center">
            
        <li class="nav-item mt-1"><a class="p-2 text-light nav-link " href="">Chapitre</a></li>

        <li class="nav-item"><a class="p-2 text-light nav-link " href="http://localhost/php/admin.php?p=connection">
          
           <i class="far fa-user fa-2x"></i>

        </a></li>

      </ul>

  </nav>


<?= $content; ?>


<!-- Footer -->

    <footer class="navbar navbar-fixed-top navabar-dark bg-primary d-flex flex-column justify-content-between pb-0">
     
      <div class="d-flex align-items-center justify-content-between w-100">

<!-- Argument -->

        <div class="d-flex">
          
          <i style="position:relative; top:3px" class="text-white fab fa-telegram-plane fa-1x mr-2"></i>

          <p class="text-white eltFooter">«Billet simple pour l'Alaska»</p>

        </div>

<!-- social networks | Facebook & twitter -->

        <div class="mb-2 d-flex flex-column align-items-center justify-content-center border-left pl-2">

          <p class="badScript text-white">Retrouvez-moi</p>

          <div class="d-flex justify-content-around align-items-center w-100">
            
            <i class="text-white fab fa-twitter fa-2x"></i>

            <i class="fas fa-genderless fa-1x text-white"></i>

            <i class="text-white fab fa-facebook-f fa-2x"></i>

          </div>

        </div>

      </div>

<!-- Copyright | Jean Forteroche 2018 -->

      <div class="w-100 mt-2 mb-1 border-top">
        
        <p class="text-white mt-2 text-center mb-1">Copyright © Jean Forteroche 2018</p>

      </div>

    </footer>

  </body>

</html>
