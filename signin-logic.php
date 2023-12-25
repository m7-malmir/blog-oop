<?php
require 'config/database.php';
if(isset($_POST['submit'])){
    
    $uoe=filter_var($_POST['username_email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass=filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if(!$uoe){
        $_SESSION['signin']="username or email is required";
        }elseif (!$pass) {
            $_SESSION['signin']="password is required";
        }else {
            $fetch_user_query="SELECT * FROM `users` WHERE username='$uoe' OR email='$uoe' LIMIT 1";
            $res=mysqli_query($mysqli,$fetch_user_query);  
    if (mysqli_num_rows($res)==1) {
       $user_record=mysqli_fetch_assoc($res);
       $db_pass=$user_record['password'];
       if(password_verify($pass,$db_pass)){
        $_SESSION['user_id']=$user_record['id'];
        
            if ($user_record['is_admin']==1) {
                $_SESSION['user_is_admin']=true;
            }
            header('location:'.ROOT_URL.'admin/');
       }else{
        $_SESSION['signin']="please check your input";
    }

    }else{
        $_SESSION['signin']="user not found";
    }
   
}
if(isset($_SESSION['signin'])){
    $_SESSION['signin-data']=$_POST;
    header('location:'.ROOT_URL.'signin.php');
    die();
}
}else{
    header('location:'.ROOT_URL.'signin.php');
    die();
}

