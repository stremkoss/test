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
    public $password1;
    public $password;
    public $nameUs;
    public $email;
    public $parrams;

    public function setParams($parrams) {

        $this->parrams =$parrams;
    }

    public function getParamss($parrams) {

       return $this->parrams;
    }


   public function setUserName($nameUs) {

       $this->nameUs = $nameUs;
   }
   public function getUserName(){
       return $this->nameUs;
   }

   public function setEmail($email) {
       $this->email = $email;
   }

   public function getEmail() {
       return $this->email;
   }


   public function setPassword($password) {
       $this->password = $password;
   }
   public function getPassword() {
       return $this->password;
   }

   public function setPassword_sec($password1) {
       $this->password1 = $password1;
   }

   public function getPassword_sec() {
       return $this->password1;
   }

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
    public function setName($name){
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