<?php
/**
*
*/

namespace App;

class Parser
{
    public static function parsing($path,$array)
    {       
        $temp = file_get_contents($path);
        $text = $array['text'];
        $pos = strripos($temp,$array['title']);
        $temp = substr_replace($temp,' '.$text.' ',$pos,0);
        return $temp;
        
    }
}
