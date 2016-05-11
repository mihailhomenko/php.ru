<?php
/**
* Class to work with the database
* 
* get($name, $default = NULL)-It refers to a specific configuration property.
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace Db;

use App;
use PDO;

/**
* Class to work with the database
*/
class Db 
{
	/**
	* Database connection method
	* 
	* @return obj
	*/
	
	private static $pdo;
	
 	public static function connect ()
 	{
 		try{	
 			$dsn = "mysql:host=".App\Config::get('host').";dbname=".App\Config::get('db_name').";charset=utf-8";
			$opt = array(
    		\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
			);
			$pdo = new \PDO($dsn, App\Config::get('login'), App\Config::get('pas'), $opt);
		}catch (\Exception $e) {
			App\Logger::writeToLog($e);
			echo 'The server is temporarily unavailable';
    		die();
		}
		static::$pdo = $pdo;			
	}
	
	public static function getPdoInstance()
	{
		return static::$pdo;
	}
	
	
}
