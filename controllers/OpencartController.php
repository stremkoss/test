<?php
use Base\MainController;
use Base\View;
class OpencartController  extends Base\MainController {

    public function actionCreateProduct() {

        if($_POST) {

         $Opencart = new \Model\Opencart();
         $Opencart->InserProduct($_POST);
        }

        $this->view->render('CreateProduct');

    }





}