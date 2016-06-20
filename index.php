<?php
$controller = $_GET['controller'];

// config
require("config.php");

//enable debug mode
if($config['cms.debug']){
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('track_errors', 1);
}

//set cookie lifetime
ini_set("session.cookie_lifetime", $config['cookie.lifetime']);
//set session lifetime
ini_set('session.gc_maxlifetime', $config['session.lifetime']);
// sessions on
session_start();


// autoloading classes
//function __autoload($class_name) {
//    require('class/' . $class_name . '.php'); 
//}
require_once __DIR__ . '/vendor/autoload.php';
use CMSLoader;

$loader = new CMS\CMSLoader($config, $controller); //create the loader object
$loader->load(); //load content
