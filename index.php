<?php
/**
* index.php
*/

/**
* Turn error output
*/
ini_set('display_errors',TRUE);
ini_set('e_reporting',E_ALL);


define('BASEPATH', __DIR__);

/**
* Autoload
*/
include(BASEPATH.'/Autoload.php');
\Autoload::load();

/**
*Header
*/

App\Response::getHeader();
/**
* open Logfile 
*/
App\Logger::openLog(BASEPATH.'/logfile.log');

/**
* Load Config
*/
App\Config::load(BASEPATH.'/config/configuration.php');

/**
* Database connection
*/
Db\Db::connect();		

App\Parser::parsing('Forms\Template.php','Forms\add.php','<!--метка-->');
if ($_POST['addcomment']){
   Modules\Router::routing('Comment','delete');
}
//Modules\Router::routing(App\Request::getStr('module'),App\Request::getStr('action'));
//Modules\Router::routing('Comment','delete');
?>
