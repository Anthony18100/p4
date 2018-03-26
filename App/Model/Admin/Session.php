<?php 
 namespace App\Model\Admin;

/**
 * Class Session for flash message
 */

 class Session{

    public function __construct(){

        if(isset($_SESSION)){

            session_start();

        }

    }

    public static function setFlash($message, $type = 'danger'){

        $_SESSION['flash'] = array(

            'message' => $message,
            'type' => $type,

        );

    }

    public static function flash(){

        if(isset($_SESSION['flash'])){
            ?>
            <div class="alert w-75 d-flex justify-content-center alert-<?= $_SESSION['flash']['type']; ?>">

                <?= $_SESSION['flash']['message']; ?>

            </div>

            <?php

            unset($_SESSION['flash']);

        }

    }

 }