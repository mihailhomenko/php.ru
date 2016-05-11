<?php
/**
* File download made earlier and work with the configuration
* 
* The file includes a class with two methods,
* load($path)-loads the configuration,
* get($name, $default = NULL)-It refers to a specific configuration property.
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace App;	

use Exceptions;

/**
* Class Config
* 
*Class includes two methods:
*load($path)-loads the configuration,
*get($name, $default = NULL)-It refers to a specific configuration property. 
*/
class Config 
{	

	/**
	* The variable for the value of the type array
	* @var array
	*/
    private static $config;
	
	/**
	* to download the configuration function
	* 
	* @param string $path
	* 
	* @return void
	*/
    private static function set($path)
    {
    	if (!file_exists($path)) {
    		throw new Exceptions\MyException ('Invalid path specified');	
		}	
		if (!is_readable($path)) {
    		throw new Exceptions\MyException ('File read error');	
		}	
	static::$config = include($path);
	
	
	}
	
	/**
	* to download the configuration function
	* 
	* @param string $path
	* 
	* @return void
	*/
	public static function load($path)
	{
		try {	
				Config::set($path);
			} catch (Exceptions\MyException $e) {		
				Logger::writeToLog($e);
				echo 'The server is temporarily unavailable';
				die();
			}		
	}
    
    /**
	* Function to access the configuration properties
	* 
	* @param string $name
	* @param string $default
	* @return string
	*/
    public static function get($name, $default = NULL)
    {
		if (isset (static::$config[$name])) {
			return (static::$config[$name]);	
		}	
	return ($default);
	}
    
}
