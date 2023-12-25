<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    //fetch post from database in order to delete thumbnail from img folder 

    $query="select * from posts where id=$id ";
    $result=mysqli_query($mysqli,$query);

    //make sure we got back only one user
    if(mysqli_num_rows($result)==1){
        $post=mysqli_fetch_assoc($result);
        $thumbnail_name=$post['thumbnail'];
        $thumbnail_path='../img/'.$thumbnail_name;
         //delete image if available
          if($thumbnail_path){
            unlink($thumbnail_path);

            //delete post from database 
            $delete_post_query="delete from posts where id=$id limit 1";
            $delete_post_result=mysqli_query($mysqli,$delete_post_query);

            if(!mysqli_errno($mysqli)){
                $_SESSION['delete-post-su']="post delete successfully";
                }
            }
    }
}
header('location:' .ROOT_URL.'admin/');
die();