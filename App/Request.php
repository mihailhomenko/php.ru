<?php 
/**
* The file with form data
* 
* The file includes a class with two methods,
* getStr($name, $def = ' ')- It works with data type str,
* getInt($key, $def = 0)- It works with data type int.
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace App;	

/**
* Class Request
* 
* Class includes two methods
* getStr($name, $def = ' ')- It works with data type str,
* getInt($key, $def = 0)- It works with data type int.
*/

class Request
{   
	/**
	* Function to check the data type str
	* @param string $name
	* @param string $def
	* @return string
	*/
	public static function getStr($name, $def = ' ')
	{
		$value = $def;
		if (isset($_POST[$name])) {
			$value = ($_POST[$name]);
		} elseif (isset($_GET[$name])){
			$value = ($_GET[$name]);
		}	
		if (get_magic_quotes_gpc()) {
			return stripslashes($value);
		} 
		return $value;
	}
	
	/**
	* Function to check the data type int
	* @param integer $key
	* @param integer $def
	* @return integer
	*/
	public static function getInt($key, $def = 0)
	{
		if (isset($_POST[$key])) {
				return (int)$_POST[$key];
		} elseif (isset($_GET[$key])){
			return (int)$_GET[$key];
		} else {
			return $def;
		}
	}
}
	
