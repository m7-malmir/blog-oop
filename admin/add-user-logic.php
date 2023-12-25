<?php 
require 'config/database.php';

if(isset($_POST['submit'])){
    $fname=filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lname=filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $uname=filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $cpass=filter_var($_POST['createpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vpass=filter_var($_POST['confirmpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin=filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);
    $avatar=$_FILES['avatar'];

    if(!$fname) {
        $_SESSION['add-user']='please enter your first name';
    }elseif(!$lname) {
        $_SESSION['add-user']='please enter your last name';
    }elseif(!$uname) {
        $_SESSION['add-user']='please enter your username';
    }elseif(!$email) {
        $_SESSION['add-user']='please enter a valid email';
    }elseif (strlen($cpass)<8 || strlen($vpass)<8) {
        $_SESSION['add-user']='password should be 8+ characters';
    }elseif (!$avatar['name']) {
        $_SESSION['add-user']='please add avatar';
    } else{
        if ($cpass !== $vpass) {
            $_SESSION['add-user']='password do not match';
        }else{
            $hash_pass=password_hash($cpass,PASSWORD_DEFAULT);
            $user_check_query="SELECT * FROM `users` WHERE `username`='$uname' OR `email`='$email'";
            $user_check_res=mysqli_query($mysqli,$user_check_query);
            if(mysqli_num_rows($user_check_res) > 0 && mysqli_num_rows($user_check_res)!=false){
                $_SESSION['add-user']='username or email already exist';
            }else{
                //work  on avatar
                $time=time();
                $avatar_name=$time . $avatar['name'];
                $avatar_tmp_name=$avatar['tmp_name'];
                $avatar_destination_path='../img/'.$avatar_name;

                $allow_file=['jpg','png','jpeg'];
                $extention=explode('.',$avatar_name);
                $extention=end($extention);
                if (in_array($extention,$allow_file)) {
                   if ($avatar['size']<1000000) {
                    ///upload
                    move_uploaded_file($avatar_tmp_name,$avatar_destination_path);
                   }else{
                    $_SESSION['add-user']='file too  big, shoud be less than 1mb ';
                   }
                }else{
                    $_SESSION['add-user']='file shoude be jpg,png or jpeg format ';
                }
            }
        }
    }
if (isset($_SESSION['add-user'])) {
    $_SESSION['add-user-data']=$_POST;
    header('location:'.ROOT_URL.'/admin/add-user.php');
    die();
}else{
    $inset_user_query="INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES ('$fname','$lname','$uname','$email','$hash_pass','$avatar_name',$is_admin)";
    mysqli_query($mysqli,$inset_user_query);
    if (!mysqli_errno($mysqli)) {
      $_SESSION['add-user-success']='new user add successfull';
      header('location:'.ROOT_URL.'/admin/manage-users.php');
      die();
    }
}
}else{
    header('location:'.ROOT_URL.'add-user.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Website</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<section class="sign-in">
    <div class="container-login">
       
        
        <p class="su-alert"><?= $_SESSION['add-user-success']; ?></p>   
    </div>
</section>


</body>
</html>
































