<?php
/**
* 
*/

namespace App;

/**
* 
*/
class Response 
{
	public static function installHeader404()
	{

        header( 'Location: http://www.ru/404.html' );
	}
    
    public static function installHeader200()
	{
        header( 'HTTP/1.1 200 OK' );
	}	
    
    public static function installHeader503()
	{
        header( 'HTTP/1.1 503 Internal Server Error' );
	}
    
    public static function installHeader()
	{
        header("Content-Type: text/html; charset=utf-8");
	}
            
}