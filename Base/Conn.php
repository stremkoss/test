<?php
namespace Base;

use PDO;

class Database
{
    static $_conect;

    static public $dataBase;

    public static function _conect($dataBase)
    {

       self::$dataBase = $dataBase;

        try {
            self::$_conect = new PDO("mysql:host=localhost;dbname=".self::$dataBase . ';','root','123');
            self::$_conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$_conect->setAttribute(PDO::ATTR_EMULATE_PREPARES,true);
        } catch (\PDOException $PDOException){

            print_r("Error can't connect" . $PDOException->getMessage());
        }
        return self::$_conect;
    }
}


