<?php 
session_start();

use App\Model\Comments\CommentsManager;
use App\Model\Reports\ReportsManager;

$acces = new App\Model\Admin\IdentificationManager();
$acces->sessionExist();


$comments = ReportsManager::reportCommentAll();



//Si il n'y pas de resulat j'affiche un message
if($comments == false){

	$resultReport = "Il n'y a aucun commentaire signalé!";
	
}

require 'App/View/Admin/Management/AllCommentView.php';
