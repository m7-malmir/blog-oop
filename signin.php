<?php

require 'config/database.php';

$uop=$_SESSION['signin-data']['username_email'] ?? null;
$pass=$_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);
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
        <h3>Sign In</h3>
        <?php if (isset($_SESSION['signin'])) : ?>
          <p class="alert">
            <?= $_SESSION['signin']; 
                unset($_SESSION['signin']);
          ?></p> 
      <?php  endif ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
        <input type="text" value="<?= $uop ?>" name="username_email" placeholder="Username or Email"><br/>
        <input type="text" value="<?= $pass ?>" name="password" placeholder="Password"><br/>
       <input type="submit" value="submit" name="submit" >
        </form>
        <p>Don't have an account? <span ><a href="signup.php" class="text-muted">Sign Up</a></span></p>
    </div>
</section>


</body>
</html>
<script src="./js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>

    var swiper = new Swiper(".mySwiper",{
        slidesPerView:1,
        spaceBetween:30,
        pagination:{
            el:".swiper-pagination",
            clickable:true,
        },
        breakpoints:{
            600:{
                slidesPerView:2,
            }
        }
    });
</script>