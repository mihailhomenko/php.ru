<?php
/**
*
*/

namespace App;

class Parser
{
    public static function parsing($path,$metka)
    {       
        $d = file_get_contents($path);
        $v = $metka['text'];
        $pos = strripos($d,$metka['title']);
        $d = substr_replace($d,' '.$v.' ',$pos,0);
        echo $d;
        
    }
}
