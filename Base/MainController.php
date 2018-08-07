<?php
namespace Base;
use Base\View;
/**
 * Created by PhpStorm.
 * User: ura
 * Date: 01.08.18
 * Time: 20:39
 */

class MainController
{


    public $view;


    public function __construct()
    {
        $this->view = new \Base\View(dirname(__DIR__));
    }

    public $params;

    public function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {


            return trim($_SERVER['REQUEST_URI'], '/');

        }
    }

    public function RunController()
    {
        $uri = $this->getUri();



        $segments = explode('/', $uri);

        $ControllerName = ucfirst($segments[0]) . 'Controller';

        $ActionName = 'action' . ucfirst($segments[1]);

        $FileController = Root . '/controllers/' . $ControllerName . ".php";

        $SmallAction = strtolower($ActionName);

        if (file_exists($FileController)) {

            include_once($FileController);
        }

        $ViewName = $segments[1];

        @$MethodAction = 'action' . ucfirst($segments[1]);


        if (class_exists($ControllerName)) {

            $Controller = new $ControllerName;

            $Controller->SetParams($segments);

            if (method_exists($Controller, $ActionName)) {
//
//                $this->view->render($ViewName);

                $Controller->$ActionName();
            }
        } else {
            echo "<div style='color: red'>No such controller</div>";
        }
    }
    public   function SetParams(array $params)
    {

        $this->params = $params;

    }


    public  function GetParams()
    {

        return array_merge($_POST,$this->params);
    }
}