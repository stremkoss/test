<?php
session_start();

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors',1);

require_once ('Autoloader.php');
require_once ('Base/Conn.php');




define('ROOT_DIR' , __FILE__, true);
define('Root' , dirname(__FILE__));

spl_autoload_register(["Autoloader", "Loader"]);







try {

    $object = new Base\MainController();

    $object->RunController();


} catch ( Exception $exception) {

    echo $exception->getMessage();
}


