<?php
use Base\MainController;
use Base\View;

class OpencartController  extends Base\MainController {

    public function actionCreateProduct() {

        if($_POST) {

         $Opencart = new \Model\Opencart();
         $result  =  $Opencart->InserProduct($_POST);
         if($result === true) {
             header('Content-Type: application/json');
             $json = ['errors'=> false,'href' => '/Admin'];
             echo json_encode($json);

             exit();

         }
        }

        $this->view->render('CreateProduct');

    }





}