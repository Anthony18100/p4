<?php 

namespace App;

/**
 * Class Auloader
 *
 * automatic loading of class
 */

class Autoloader{

	/**
	 * Register()
	 * @return [bool] [Register of the class (autoload)]
	 */
	static function register(){

		spl_autoload_register(array(__CLASS__, 'autoload'));

	}


	/**
	 * autoload()
	 * @param  $class string name class at load;
	 */
	static function autoload($class){

		if(strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }


	}


}