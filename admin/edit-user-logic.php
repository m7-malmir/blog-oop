<?php
require 'config/database.php';
if(isset($_POST['submit'])){
    $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $fname=filter_var($_POST['fname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lname=filter_var($_POST['lname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin=filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);

    if(!$fname){
         $_SESSION['edit-user']='invalid form input on edit page';
       
    }elseif(!$lname){
        $_SESSION['edit-user']='invalid form input on edit page';
        
    }else{
        $query="update users set firstname='$fname',lastname='$lname',is_admin='$is_admin' where id=$id limit 1";
        $result=mysqli_query($mysqli,$query);

        if(mysqli_errno($mysqli)){
            $_SESSION['edit-user']='failed to update user';
            header('location:'.ROOT_URL.'/admin/edit-user.php');
            
        }else{
            $_SESSION['edit-user-success']="user $fname $lname update successfully";
            header('location:'.ROOT_URL.'admin/manage-users.php');
            
        }
        
    
  }
}
 header('location:'.ROOT_URL.'admin/manage-users.php');
 die();