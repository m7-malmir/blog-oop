<?php
include 'partials/header.php';
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query="select * from posts where id=$id";
    $res=mysqli_query($mysqli,$query);
    $post=mysqli_fetch_assoc($res);
}else{
    header('location: '.ROOT_URL.'index.php');
    die();
}
?>

    <section class="container post__container">
        <div class="main-card">
            <h1><?= $post['title'] ?></h1>
            <?php
        $user_id=$post['author_id'];
                   $user_q="SELECT * FROM `users` WHERE `id`=$user_id";
                   $c_result=mysqli_query($mysqli, $user_q);
                   $user=mysqli_fetch_assoc($c_result);
                   $f_name=$user['firstname'];
                   $l_name=$user['lastname'];
                   $avatar=$user['avatar'];
        ?>
        <div class="user">
            <div class="profile-picture">
               <img src="./img/<?= $avatar ?>" alt="">
                </div>
                <div class="ingo">
                  <h5>By: <?= "{$f_name} {$l_name}" ?></h5>
                  <small><?= date("M d, Y - H:i",strtotime($post['date_time'])) ?></small>
            </div>  
            </div><!--user-->
            <div>
                <img src="./img/<?= $post['thumbnail'] ?>" alt="">
            </div>
            <p>  <?=  $post['body']  ?>...</p>
        </div><!--main-card-->
    </section><!--container header__container-->
    <?php
include('partials/footer.php');
?>