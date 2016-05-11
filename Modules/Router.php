<?php
/**
* 
*/

namespace Modules;

/**
* 
*/
class Router
{
	public static function Routing($module, $submodule)
	{   
        return call_user_func(__NAMESPACE__ .'\\'.$module.'Module::'.$submodule.'CommentAction');
		
	}
	
}