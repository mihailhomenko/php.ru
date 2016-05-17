<?php
/**
* To parse a template class
* 
* get($name, $default = NULL)-It refers to a specific configuration property.
* @author Miha__ <mihail.homenko@yandex.ru>
* @version 1.0
*/

namespace App;

use Exceptions;

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
    public static function parsing($path, $array)
    {
        if (!file_exists($path)) {
        throw new Exceptions\MyException ('Invalid path specified');
        }

        if (!is_readable($path)) {
            throw new Exceptions\MyException ('File read error');
        }

        $temp = file_get_contents($path);

        foreach ($array as $mark => $text) {
            $pos = strripos($temp,'<!--'.$mark.'-->');

            if ($pos){
                $temp = substr_replace($temp,' '.$text.' ',$pos,0);}
            }
        return $temp;    
    }
    
    public static function formparsing($path,$array)
    {
        if (!file_exists($path)) {
            throw new Exceptions\MyException ('Invalid path specified');
        }

        if (!is_readable($path)) {
            throw new Exceptions\MyException ('File read error');
        }

        $temp = file_get_contents($path);
        
        foreach ($array as $form) {
            $pos = strripos($temp,'<!--include"'.$form.'"-->');

            if ($pos) {
                ob_start();
                include $form;
                $form = ob_get_contents();
                ob_clean();

                $temp = substr_replace($temp, ' ' . $form . ' ', $pos, 0);
            }
        }
        return $temp;
    }
}
