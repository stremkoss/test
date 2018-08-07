<?php
namespace Base;
use PDO;
use \Base\Database;
class  Modesl  extends Database{


    public $description;
    public $name;
    public $price;
    public $weight;
    public $stock;
    public $quantity;
    public $date_added;
    public $properies;



    public function setDesc($description){
        $this->description = $description;
    }
    public function setDate_Add($date_added) {
        $this->date_added = $date_added;
    }
    public function getDate_Added() {
        return $this->date_added;
    }

    public function getDesc(){
        return $this->description;
    }
    public function setNmae($name){
        $this->name =$name;
    }
    public function getName(){
        return $this->name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getPrice() {
        return $this->price;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getWeight() {

        return $this->weight;
    }
    public function setStock($stock) {
        $this->stock = $stock;
    }
    public function getStock() {
        return $this->stock;
    }
    public function setPar($par) {
        $this->par = $par;
    }
    public function getPar() {
        return $this->par;
    }








}