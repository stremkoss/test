<?php
namespace Base;

class View   {

    private  $params = [];
    private  $data;

    public function __set($name, $value)
    {
       $this->params[$name] = $value;
    }

    public function __get($key)
    {
     return isset($this->params[$key]) ? $this->params[$key] : null;
    }


    public function render($script) {


        $filePath = ROOT_DIR . "/Views/" . $script;

        if(!$filePath) {
            throw new Exception('File not found' . $script);
        }

        ob_start();

        include ($script);

        return ob_get_clean();

    }


}