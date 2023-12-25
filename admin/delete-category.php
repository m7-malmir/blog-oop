<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);



    //update category_id of posts thst belong to this category to id of uncategorized category
    $update_query="update posts set category_id=5 where category_id=$id";
    $update_result=mysqli_query($mysqli,$update_query);

    //delete category from database

    if(mysqli_errno($mysqli)){
        $_SESSION['delete-category']="couldn't delete";
    }else{
        $delete_cat_query="delete from categories where id=$id limit 1";
        $delete_cat_result=mysqli_query($mysqli,$delete_cat_query);
        $_SESSION['delete-category-success']="deleted successfully ";
    }
}
header('location:' .ROOT_URL.'admin/manage-categories.php');
die();