<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    //fetch user from database
    $query="select * from users where id=$id";
    $result=mysqli_query($mysqli,$query);
    $user=mysqli_fetch_assoc($result);

    //make sure we got back only one user
    if(mysqli_num_rows($result)==1){
        $avatar_name=$user['avatar'];
        $avatar_path='../img/' .$avatar_name;
        //delete image if available
        if($avatar_path){
            unlink($avatar_path);
        }
    }
    //for later

    //fetch all thumbnail of user's post and delete them
    $thumbnail_query="select thumbnail from posts where author_id=$id";
    $thumbnail_result=mysqli_query($mysqli,$thumbnail_query);
    if(mysqli_num_rows($thumbnail_result) > 0){
        while ($thumbnail=mysqli_fetch_assoc($thumbnail_result)) {
           $thumbnail_path='../img/'.$thumbnail['thumbnail'];
           //delete thumbnail from img folder is exit
           if( $thumbnail_path){
            unlink($thumbnail_path);
           }
        }
    }

    //delete user from database
    $delete_user_query="delete from users where id=$id";
    $delete_user_result=mysqli_query($mysqli,$delete_user_query);
    if(mysqli_errno($mysqli)){
        $_SESSION['delete-user']="couldn't delete {$user['firstname']} {$user['lastname']}  ";
    }else{
        $_SESSION['delete-user-success']=" {$user['firstname']} {$user['lastname']} deleted successfully ";
    }
}
header('location:' .ROOT_URL.'admin/manage-users.php');
die();