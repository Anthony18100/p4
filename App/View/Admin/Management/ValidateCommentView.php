<!-- Validate comments -->

<?php
session_start();
$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();

        if(!empty($_POST)){

            $result = App\Model\Comments\CommentsManager::validateComment($_POST['id']);

        }
