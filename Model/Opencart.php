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

        $query = self::_conect('opencart');

         $query->beginTransaction();

         $sql = "insert into oc_product
(model, sku, upc, ean, jan, isbn, mpn, location, quantity, stock_status_id, image, manufacturer_id,
 shipping, price, points, tax_class_id, date_available, weight, weight_class_id,
 length, width, height, length_class_id, subtract,
 minimum, sort_order, status, viewed, date_added, date_modified)
VALUES ('asdasd', sku, '', '', '', '', '', '', '2', '1', '',
  '2',
  '2', :prd_price,
  '2', '1', current_date(), :prd_weight, '1',
  '2.3', '1.3', '1.3', '1', '1',
        '1', '1', '1', '1', current_date(), current_date())";

         $this->_db = $query->prepare($sql);

         $this->_db->bindValue(':prd_price',$product['prd_price'],PDO::PARAM_INT);
         $this->_db->bindValue(':prd_weight',$product['prd_weight'],PDO::PARAM_INT);

         $this->_db->execute();

         $lastId = $query->lastInsertId();



        $sql = "insert into oc_product_description

(product_id,language_id, name, description, tag, meta_title, meta_description, meta_keyword) VALUES

  ($lastId,1,:prd_name,:prd_desc,'lol','lol1','KIK','join');
";

        $this->_db = $query->prepare($sql);

        $this->_db->bindValue(':prd_desc',$product['prd_desc'],PDO::PARAM_STR);
        $this->_db->bindValue(':prd_name',$product['prd_name'],PDO::PARAM_STR);

        $result =   $this->_db->execute();


       if($result === true) {

           $query->commit();

           return true;
       }
         $query->rollBack();



     }

}

