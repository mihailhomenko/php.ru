<?php
/**
* Startup classes
* 
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

/**
* Class Autoload 
* 
* Class automatically loads the classes used in the program.
*/
class Autoload  
{
	/**
	* The function of the autoload class
	* 
	* @param string $className
	* 
	* @return void
	*/
	private static function get($className)
	{	
	$fileName = 
	BASEPATH.
	DIRECTORY_SEPARATOR.
	str_replace('\\', DIRECTORY_SEPARATOR, $className).
	'.php';
	
    require_once $fileName;
	}
	
	public static function load()
	{
		spl_autoload_register('\Autoload::get');
	}
}