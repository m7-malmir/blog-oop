<?php
include 'partials/header.php';

if(isset($_POST['submit'])){
    $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);;
    $previous_thumbnail_name=filter_var($_POST['previous_thumbnail_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_id=filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
    $is_featured=filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);
    $thumbnail=$_FILES['thumbnail'];
    //set is_featured is unchecked if 0
    $is_featured=$is_featured ==1 ? :0;

    //validate form data
    if(!$title) {
        $_SESSION['edit-post']='please enter post title';
    }elseif(!$cat_id) {
        $_SESSION['edit-post']='select post category';
    }elseif(!$body) {
        $_SESSION['edit-post']='enter post body';
    }else{
        if ($thumbnail['name']) {
            $previous_thumbnail_path='../img/' .$previous_thumbnail_name;
            if($previous_thumbnail_path){
                unlink($previous_thumbnail_path);
            }

        $time=time();
        $thumbnail_name=$time . $thumbnail['name'];
        $thumbnail_tmp_name=$thumbnail['tmp_name'];
        $thumbnail_destination_path='../img/'.$thumbnail_name;
        //make sure file an image
        $allow_file=['jpg','png','jpeg'];
        $extention=explode('.',$thumbnail_name);
        $extention=end($extention);
        if (in_array($extention,$allow_file)) {
           if ($thumbnail['size']<1000000) {
            ///upload
            move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
           }else{
            $_SESSION['edit-post']='file too  big, shoud be less than 1mb ';
           }
        }else{
            $_SESSION['edit-post']='file shoude be jpg,png or jpeg format ';
        }
       }
    }
    if (isset($_SESSION['edit-post'])) {
        $_SESSION['edit-post-data']=$_POST;
        header('location:'.ROOT_URL.'/admin/edit-post.php?id=$_SESSION["post_id"]');
        die();
    }else{
        if($is_featured==1){
            $zero_all_featured_query="update posts set is_featured=0";
            $zero_all_featured_result=mysqli_query($mysqli,$zero_all_featured_query);
        }

        $thumbnail_to_insert=$thumbnail_name ?? $previous_thumbnail_name;
        //update into database
        $query= "UPDATE `posts` SET `title`='$title',`body`='$body',`thumbnail`='$thumbnail_to_insert',`category_id`='$cat_id',`is_featured`='$is_featured' WHERE `id`=$id limit 1";
        $result=mysqli_query($mysqli,$query);
   
    }
    if(!mysqli_errno($mysqli)){

        echo 'ok';
        $_SESSION['edit-post-success']='new post edited successfully';

       
      
        header('location:'.ROOT_URL.'admin/');
        die();
    }else{
        echo 'not ok';
    }
}
header('location:'.ROOT_URL.'admin/');
die();