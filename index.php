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

use App\Request;

App\Response::installHeader();
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

Modules\Router::resolve(
    Request::getStr('module'),
    Request::getStr('action')
);



