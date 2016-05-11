<?php
/**
*
*/

namespace App;

class Parser
{
    public static function parsing($path1,$path2,$metka1,$metka2)
    {       
        $d = file_get_contents($path1);
        $v = file_get_contents($path2);
        $pos1 = strripos($d,$metka1);
        $pos1 = $pos1 + strlen($metka1)+1;
        $pos2 = strripos($d,$metka2);
        $pos2 = $pos2 + strlen($metka2);
        $d = substr($d,0,$pos1).substr($d,strripos($d,$metka2),-1);
        $d = substr_replace($d,' '.$v.' ',$pos1,-$pos2);
        file_put_contents($path1,$d);
    }
}
