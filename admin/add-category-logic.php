<?php 
require 'config/database.php'; 

if(isset($_POST['submit'])){

    //get form data
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $desc=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title){
        $_SESSION['add-category']="enter title";
    }elseif (!$desc) {
        $_SESSION['add-category']="enter description";
    }


    //redirect back to add category page with form data if there was invalid input
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data']=$_POST;
        header('location:' .ROOT_URL.'admin/add-category.php');
        die();
    }else{
        //insert to database
        $query="insert into categories(title,description) VALUES ('$title',' $desc')";
        $result=mysqli_query($mysqli,$query);
        if(mysqli_errno($mysqli)){
            $_SESSION['add-category']='Could Not add category';
            header('location:' .ROOT_URL.'admin/add-category.php');
            die();
        }else{
            $_SESSION['add-category-success']="category $title added successfully";
            header('location:' .ROOT_URL.'admin/manage-categories.php');
            die();
        }
    }

}


