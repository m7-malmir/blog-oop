<?php
include 'partials/header.php';

if(isset($_POST['submit'])){
    $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $desc=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$title || !$desc){
        $_SESSION['edit-category']='invalid form input on edit category page';
    }else{
        $query="update categories set title='$title',description='$desc' where id=$id limit 1";
        $result=mysqli_query($mysqli,$query);
        var_dump($result);
        if(mysqli_errno($mysqli)){
            $_SESSION['edit-category']='failed to update category';
        }else{
            $_SESSION['edit-category-success']="user $title update successfully";
            
            header('location:'.ROOT_URL.'admin/manage-categories.php');
        die();
        }
    }


}
header('location:'.ROOT_URL.'admin/manage-categories.php');
die();