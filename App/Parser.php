<?php
/**
*
*/

namespace App;

class Parser
{
    public static function parsing($path1,$path2,$metka)
    {       
        $d = file_get_contents($path1);
        $v = file_get_contents($path2);
        $pos = strripos($d,$metka);
        $d = substr_replace($d,$v,$pos,0);
        echo $d;
    }
}
