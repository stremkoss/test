<?php

class Autoloader
{
    public static function Loader($className)
    {
        $fileName = str_replace('\\',DIRECTORY_SEPARATOR, $className) . ".php";

        if (file_exists($fileName)) {

            include ($fileName);

            if (class_exists($className)) {

                return true;
            }
        }
        return false;
    }
}