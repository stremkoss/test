<?php
/**
 * Created by PhpStorm.
 * User: ura
 * Date: 12.08.18
 * Time: 18:27
 */

class AdminController extends Base\MainController {


    public function actionRegister ()
    {
        if(!empty($_POST)) {

            $whoIsthat = new Model\Admin();
            $whoIsthat->setEmail($_POST['email']);
            $whoIsthat->setUserName($_POST['user']);
            $whoIsthat->setPassword($_POST['password']);
            $whoIsthat->setPassword_sec($_POST['password_ret']);
            $MakeMe = $whoIsthat->EntityConfirm();


        }

       $this->view->render('Register');
    }

    public function actionLogin(){

     if($_POST) {

         return 1;
     }

        $this->view->render('Login');

    }


}