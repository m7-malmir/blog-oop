<?php 
require 'config/database.php';

$fname=$_SESSION['signup-data']['firstname'] ?? null;
$lname=$_SESSION['signup-data']['lastname'] ?? null;
$uname=$_SESSION['signup-data']['username'] ?? null;
$email=$_SESSION['signup-data']['email'] ?? null;
$cpass=$_SESSION['signup-data']['createpassword'] ?? null;
$vpass=$_SESSION['signup-data']['confirmpassword'] ?? null;

//delete signup data session
unset($_SESSION['signup-data']);
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
        <h3>Sign Up</h3>
        <?php if (isset($_SESSION['signup'])) : ?>
          <p class="alert">
            <?= $_SESSION['signup']; 
                unset($_SESSION['signup']);
          ?></p> 
        <?php elseif(isset($_SESSION['signup-success'])) : ?>
            <p class="su-alert">
            <?= $_SESSION['signup-success']; 
                unset($_SESSION['signup-success']); ?>
          </p>
      <?php  endif ?> 
        <form action="<?= ROOT_URL ?>signup-logic.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="<?= $fname ?>" name="firstname" placeholder="First name"><br/>
            <input type="text" value="<?= $lname ?>" name="lastname" placeholder="Last name"><br/>
            <input type="text" value="<?= $uname ?>" name="username" placeholder="Username"><br/>
            <input type="email" value="<?= $email ?>" name="email" placeholder="email"><br/>
            <input type="password" value="<?= $cpass ?>" name="createpassword" placeholder="Create Password"><br/>
            <input type="password" value="<?= $cpass ?>" name="confirmpassword" placeholder="Confirm password"><br/>
            <p>User Avatar</p>
            <input type="file" id="avatar" name="avatar"><br/>
            <input type="submit" name="submit" value="Sign up"><br/>
        </form>
        <p>Already have an account? <span ><a href="signin.php" class="text-muted">Sign In</a></span></p>
    </div>
</section>


</body>
</html>
<script src="./js/main.js"></script>
