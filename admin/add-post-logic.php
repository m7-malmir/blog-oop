<?php
require 'config/database.php';

 if(isset($_POST['submit'])){

    $author_id=$_SESSION['user_id'];
    $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_id=filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
  
$is_featured=filter_var($_POST['is_featured'],FILTER_SANITIZE_NUMBER_INT);

    $thumbnail=$_FILES['thumbnail'];
    //set is_featured is unchecked if 0
    if(isset($_POST['is_featured'])){  
        $is_featured =$_POST['is_featured'];
        if ($is_featured != '1') {
            $is_featured = '0';
        }
    }
    //validate form data
    if(!$title) {
        $_SESSION['add-post']='please enter post title';
    }elseif(!$cat_id) {
        $_SESSION['add-post']='select post category';
    }elseif(!$body) {
        $_SESSION['add-post']='enter post body';
    }elseif(!$thumbnail['name']) {
        $_SESSION['add-post']='choose post thumbnail';
    }else{
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
            $_SESSION['add-post']='file too  big, shoud be less than 1mb ';
            die();
           }
        }else{
            $_SESSION['add-post']='file shouis_featuredde be jpg,png or jpeg format ';
            die();
        }

    }
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data']=$_POST;
        echo 'location go to add-post';
        header('location:'.ROOT_URL.'/admin/add-post.php');
        die();
    }else{
        if(isset($_POST['is_featured'])){
        if($is_featured==1){
            $zero_all_featured_query="update posts set is_featured=0";
            $zero_all_featured_result=mysqli_query($mysqli,$zero_all_featured_query);
        }
    }else{
        $is_featured=0;
    }
        //insert into database
        $query="INSERT INTO `posts`(`title`, `body`, `thumbnail`, `category_id`, `author_id`, `is_featured`) VALUES
        ('{$title}','{$body}','{$thumbnail_name}', '{$cat_id}', '{$author_id}', '{$is_featured}')";
        
        $result=mysqli_query($mysqli,$query);
        
        if(!mysqli_errno($mysqli)){
            $_SESSION['add-post-success']='new post added successfully';
            header('location:'.ROOT_URL.'admin/');
            die();
        }
     }
}
header('location:'.ROOT_URL.'admin/add-post.php');
die();