<?php

class ShowProduct extends Dbh{
    protected function getProductInfo(){
        $stmt=$this->connect()->prepare("SELECT * FROM `posts`");
        $stmt->execute();
        $row=$stmt->fetchAll();
        return $row; 
    }
    protected function getCatInfo($userId){
        $stmt=$this->connect()->prepare('SELECT * FROM `categories` WHERE `id`=$category_id');
        if(!$stmt->execute(array($userId))){
            $stmt= null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt=null;
            header("location:profile.php?error=profilenotfound!");
            exit();
        }
        $profiledata=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profiledata;
    }
          // $category_id=$post['category_id'];
              // $category_q="SELECT * FROM `categories` WHERE `id`=$category_id";
              // $c_result=mysqli_query($mysqli, $category_q);
              // $category=mysqli_fetch_assoc($c_result);
              // $cat_title=$category['title'];
}    