<?php 

use App\Model\Reports\ReportsManager;

if(!empty($_POST)){

       	$reportsManager = new ReportsManager();
       	$result = $reportsManager->reportComment($_POST['id']);

 }