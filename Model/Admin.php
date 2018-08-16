<?php
namespace Model;
use Base\Modesl;
use Squareup\Exception;

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

        if (strlen ($this->getPassword()) >= 1

            && strlen ($this->getPassword_sec()) >= 1) {

            $this->CheckEmail($this->getEmail());

          $CheckUser= $this->IsAlready();
            $IsCreate = $this->CreateUser();

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

    $email = $this->getEmail();

     $query = self::_conect('Admin');

     $sql = "SELECT Email_s FROM Users

    WHERE Email_s =   " . "'$email'" ;



     $getThem = $query->prepare($sql);

     $getThem->execute(array($email));

     $result = $getThem->fetch(\PDO::FETCH_COLUMN);

     if($result == true) {

         echo json_encode(array('error'=>true, 'message' => 'Email and userName exists'));
         exit();
     }

     echo json_encode(array('error'=>false,'href' => 'Login'));
        exit();
    }


}