<?php
require_once 'showProduct.classes.php';
class ShowProductContr extends ShowProduct{
    public function showProduct(){
        return $this->getProductInfo();
    }
}
