<?php
/**
* Logging exceptions 
* 
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace App;

use Exceptions;

/**
* Logging exceptions in file.
*/
class Logger 
{ 	
	public static $file;
	
	public static function openLog($path)
	{	
		static::$file = fopen($path, "a+");
	}

	/**
	* Logging exceptions in file "logfile.log"
	* 
	* @param obj $e
	* 
	* @return void
	*/
	public static function writeToLog(\Exception $e) 
	{
		fwrite(static::$file,"\r\n".date(DATE_RFC2822)."\r\n".'Error: '.$e->getMessage()."\r\n".'File:'.$e->getFile()."\r\n".'Line:'.$e->getLine()."\r\n");
		fclose(static::$file);	
	}
}