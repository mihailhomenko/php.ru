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
	public static function resolve($moduleName, $actionName)
	{
        if(!$moduleName or !$actionName) {
            $moduleName = App\Config::get('default_module');
            $actionName = App\Config::get('default_action');
        }

        $className = App\Config::get('modules_namespace').$moduleName.'Module';

        $actionName = $actionName.'Action';

        if(!class_exists($className)) {
            throw new \InvalidArgumentException('Called module does not exist!');
        }

        $module = new $className();

        if(!method_exists($module, $actionName)) {
            throw new \InvalidArgumentException('Called action does not exist!');
        }

        return call_user_func_array(array($module, $actionName), array());
	}
}