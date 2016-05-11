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
	public static function getHeader404()
	{

        header( 'Location: http://www.ru/404.html' );
	}
    
    public static function getHeader200()
	{
        header( 'HTTP/1.1 200 OK' );
	}	
    
    public static function getHeader503()
	{
        header( 'HTTP/1.1 503 Internal Server Error' );
	}
    
    public static function getHeader()
	{
        header("Content-Type: text/html; charset=utf-8");
	}
            
}