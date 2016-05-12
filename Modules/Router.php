<?php
/**
* 
*/

namespace Modules;

use App;
/**
* 
*/
class Router
{
	public static function Routing($module, $action)
	{   
    if ((isset($module))&&(isset($action)))
    {
        return call_user_func(__NAMESPACE__ .'\\'.$module.'Module::'.$action.'CommentAction');
    } else { return call_user_func(__NAMESPACE__.'\\'.App\Config::get('defolt_module').'Module::'.App\Config::get('defolt_action').'CommentAction');
    }
	}
}