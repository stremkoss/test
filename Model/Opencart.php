<?php
namespace  Model;
use Base\Database;
use Base\Modesl;
use PDO;

class Opencart extends Modesl {

    protected $_db;
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
     public function InserProduct(array $product) {

        if(!is_array($product)) {
            echo "<div style='color: green'>Product is not array</div>";
        }

        $query = self::_conect();

        $sql = "Inser into oc_product_description
         (name,description)
                  Values(:)";

        $this->_db = $query->prepare($sql);

        $this->_db->bindParam(':prd_desc',$product['prd_desc']);
        $this->_db->bindParam(':prd_name',$product['prd_name']);

        $this->_db->execute();

        $lastId = $query->lastInsertId();

        $sql = "Inser into oc_product()
              "

        $this->_db = $query->prepare($sql);

     }
}

