<?php
namespace  Model;
use Base\Database;
use PDO;

class Opencart extends Database{


    public function SelectAll_ProductItems() {

        $sql = "select  price,weight,date_added,quantity,
                  pr_d.name,pr_d.description

             from oc_product

left join oc_product_description as pr_d on oc_product.product_id = pr_d.product_id
              
            ";

        self::_conect();

        $query = self::_conect()->prepare($sql);

        $query->execute();

        $product_arr = [];

        while ($row = $query->fetchAll(PDO::FETCH_ASSOC)) {

            $product_arr = $row;

        }

        return $product_arr;
    }

}

