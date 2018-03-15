<?php 



namespace App\Controller\Form;

class Form{

	private $data;
	

	public function __construct($data){

		$this->data = $data;

	}


	public function input($type, $name, $placeholder){

		return '<input type="'. $type . '" class="form-control" name="' . $name . '" placeholder="' . $placeholder .'">';

	}


	public function textarea($type, $name, $placeholder){

		return '<<textarea type="'. $type . '" class="form-control" name="' . $name . '" placeholder="' . $placeholder .'"></textarea> ';

	}


}
