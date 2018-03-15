<?php 

namespace App\Controller;

class AppController{

	protected $template = 'default';


	public function __construct(){

		$this->viewPath  = 'View/';

	}


}