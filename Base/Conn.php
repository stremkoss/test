<?php
namespace Base;

use PDO;

class Database
{
    static $_conect;

    public static function _conect()
    {

        try {
            self::$_conect = new PDO("mysql:host=localhost;dbname=opencart;",'root','123');
            self::$_conect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$_conect->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        } catch (\PDOException $PDOException){

            print_r("Error cant connect" . $PDOException->getMessage());
        }
        return self::$_conect;
    }
}


