<?php
namespace Model;
use PDO;
use \Base\Database;
use Model\Model;

class Shopify  extends Model {



   public function CurlShppify($paramss) {


       foreach ($paramss as $params) {

           foreach ($params as $key => $value) {

               $model = new Model();

               $model->setPrice($params['price']);
               $model->setWeight($params['weight']);
               $model->setDate_Add($params['date_added']);
               $model->setStock($params['quantity']);
               $model->setNmae($params['name']);
               $model->setDesc(htmlspecialchars_decode($params['description']));


               $aray_prod = array(
                   "product" => array(
                       'title' => '',
                       "title" => $model->getName(),
                       "body_html" => htmlspecialchars_decode($model->getDesc()),
                       "vendor" => "Burton",
                       "product_type" => "Snowboard",
                       "published" => true,
                       "variants" => array(
                           array(
                               "sku" => rand(1, 100) . 'say',
                               "price" => $model->getPrice(),
                               "grams" => 200,
                               "taxable" => false,
                               "weight" => '0.200'
                           )
                       )
                   )
               );
               break;
           }
               $ApiKey = '4089d0f5a27b03d72461eca60d476d98';
               $Pass = '9ee104cff45b773f6b6adccc11309298';
               $url = "https://" . $ApiKey . ':' . $Pass . '@' . "asd2123.myshopify.com/admin/products.json";

               $headers = array(
                   'Accept:  application/json',
                   'Content-Type: application/json'
               );

               $curl = curl_init();
               curl_setopt($curl, CURLOPT_URL, $url);
               curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
               curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
               curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
               curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($aray_prod));

               $response = curl_exec($curl);
               curl_close($curl);
              

       }
                return false;
       }

}