<?php
session_start();

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors',1);


require_once ('Base/Conn.php');
require_once ('Classes/Opencart.php');
require_once('Model/Model.php');
require_once ('Classes/Shopify.php');
require_once ('Autoloader.php');

define('ROOT_DIR' , __FILE__, true);
define('Root' , dirname(__FILE__));

spl_autoload_register(["Autoloader", "Loader"]);




try {

    $object = new Base\MainController();

    $object->RunController();


} catch ( Exception $exception) {

    echo $exception->getMessage();
}


