<?php
namespace Model;
use Base\Modesl;

/**
 * Created by PhpStorm.
 * User: ura
 * Date: 12.08.18
 * Time: 18:20
 */

class Admin extends \Base\Modesl {

    protected $Admin;

    protected $User;


    public function destroySesion() {

    }

    public function IdentifyMan() {

    }

    public function CheckEmail() {

        if(preg_match ('/(^[a-z0-9]+)[@][a-z]+[.][a-z]{1,5}/i',


                $this->getEmail())


            && strlen($this->getEmail()) > 5) {


            return true;
        }

        return false;
    }



    public function EntityConfirm() {

        if (strlen ($this->getPassword()) >= 6

            && strlen ($this->getPassword_sec()) >= 6) {

            $this->CheckEmail($this->getEmail());


//          $IsCreate = $this->CreateUser();

          return true;
        }

        return false;

    }

    public function CreateUser() {

       $connect = self::_conect('Admin');

       $sql = "Insert into Admin.Users
              ( user_pass, user_name, user_pass1,Email_s) 
              VALUES (:user_pass,:user_name,:user_pass1,:Email_s)";

    $insert =  $connect->prepare($sql);

    $password = password_hash($this->getPassword(),PASSWORD_DEFAULT);
    $password1 =$password;


    $insert->bindValue(':user_pass',$password);
    $insert->bindValue(':user_name',$this->getUserName());
    $insert->bindValue(':user_pass1',$password1);
    $insert->bindValue(':Email_s',$this->getEmail());

    $result = $insert->execute();

      if($result == true) {

          return true;
      }

    }

    public function IsAlready() {

     $query = self::_conect('Admin');

     $sql = "select Email_s,user_name from Admin.Users";

     $getThem = $query->prepare($sql);

      $getThem->execute();

     while ($res = $getThem->fetchAll(\PDO::FETCH_ASSOC)){

         $array [] = $res;

     }




    }


}