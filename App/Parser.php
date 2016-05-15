<?php
/**
* To parse a template class
* 
* get($name, $default = NULL)-It refers to a specific configuration property.
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace App;

/**
*To parse a template class
*/
class Parser
{
    /**
     * To parse a template func.
     * 
     * @param string $path
     * @param array $array
     * 
     * @return string
     */
    public static function parsing($path,$array)
    {       
        $temp = file_get_contents($path);
        foreach ($array as $key => $value) {
        $pos = strripos($temp,'<!--'.$key.'-->');
        $temp = substr_replace($temp,' '.$value.' ',$pos,0);   
        }
        return $temp; 
//        $text = $array['text'];
//        $pos = strripos($temp,$array['title']);
//        if ($pos){
//        $temp = substr_replace($temp,' '.$text.' ',$pos,0);
//        return $temp;
//        } else return $temp;    
    }
}
