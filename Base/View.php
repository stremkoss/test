<?php
namespace Base;

class View   {

    public $params = [];

    public function __set($name, $value)
    {

        $this->params[$name] = $value;
    }

    public function __get($key)
    {

        return isset($this->params[$key]) ? $this->params[$key] : null;
    }

    public function render($script)
    {

        $filePath = $_SERVER['DOCUMENT_ROOT'] . "Views/" . $script .'.phtml';

        if(!$filePath) {

            throw new Exception('File not found' . $script);
        }

        ob_start();

        include ($filePath);

        return ob_get_contents();

    }


}