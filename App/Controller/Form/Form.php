<?php 

namespace App\Controller\Form;

/**
 * Class Form
 *
 * Class to build forms
 */

class Form{

	/**
	 * Attribut
	 * @var string
	 */
	private $data;


	/**
	 * [__construct description]
	 * @param array $data [description]
	 */
	public function __construct($data = array()){

		$this->data = $data;

	}


	private function getValue($index){

		if(is_object($this->data)){

			return $this->data->$index;

		}

		return isset($this->data[$index]) ? $this->data[$index] : null;

	}

	public function input($type, $name, $placeholder){

		return '<input type="'. $type . '" value="' . $this->getValue($name) . '" class="form-control" name="' . $name . '" placeholder="' . $placeholder .'">';

	}


	public function button($type, $class, $name, $value){

		return '<input type="'. $type . '" class="'. $class .'" name="' . $name . '" value="'. $value .'"/>';

	}


	public function textarea($type, $name, $id, $placeholder){

		return '<textarea type="'. $type . '" class="form-control" name="' . $name . '" id="' . $id . '" placeholder="' . $placeholder .'">' . $this->getValue($name) . '</textarea> ';

	}


	public function label($for, $value){

		return '<label for="' . $for . '">' . $value . '</label>';

	}


}
