<?php

class DeleteProductContr extends DeleteProduct{
    public function __construct(){
        //todo
    }
    public function showProduct(){
        return $this->getProductInfo();
    }
}