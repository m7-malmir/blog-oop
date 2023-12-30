<?php

class ShowProduct extends Dbh{
    protected function getProductInfo(){
        $stmt=$this->connect()->prepare("SELECT * FROM `posts`");
        $stmt->execute();
        $row=$stmt->fetchAll();
        return $row; 
    }
}    