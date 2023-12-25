<?php

use LDAP\Result;

include 'partials/header.php';
$f_query="SELECT * FROM `posts` WHERE `is_featured`=1";
$f_result=mysqli_query($mysqli,$f_query);
$featured=mysqli_fetch_assoc($f_result);
$post_q="SELECT * FROM `posts` ORDER BY `date_time` LIMIT 9";
$r_post=mysqli_query($mysqli,$post_q);
?>
<section class="blog">
    <div class="container__search ">
        <div class="search-bar">
            <i class="uil uil-search text-muted"></i>
            <input type="search" class="text-muted" placeholder="Search">
            <button class="btn-blog">Go</button>
        </div> 
    </div><!--container-->
</section><!--end of header-->
<section class="container content__container">
<?php while($post = mysqli_fetch_assoc($r_post)) : ?>
    <div class="other_posts">

        <div class="header__right-image">
            <img src="./img/<?= $post['thumbnail'] ?>" alt="">
        </div><!--header__right-image-->
        <?php
              $category_id=$post['category_id'];
              $category_q="SELECT * FROM `categories` WHERE `id`=$category_id";
              $c_result=mysqli_query($mysqli, $category_q);
              $category=mysqli_fetch_assoc($c_result);
              $cat_title=$category['title'];
              ?>
          <div class="category__title">
            <a href="category-posts.php?id=<?= $post['category_id'] ?>" class=""><?= $cat_title ?></a>
        </div>
        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>">
        <h4><?= $post['title'] ?></h4>
        <p class="text-muted">
        <?=  substr($post['body'], 0,150)  ?>...
        </p>
        </a>
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
          
          </div>

    </div><!--other_posts-->

<?php endwhile ?>
</section><!--container content__container-->

<span class="line"></span>
<section class="category-footer-section">
    <div class="category-footer">
    
        <ul>
        <?php 
      $q_selector="select * from categories";
      $result_cat=mysqli_query($mysqli,$q_selector);
      while($cat=mysqli_fetch_assoc( $result_cat)) :
      ?>
            <li><a href="<?= ROOT_URL ?>category-posts.php?id=<?=  $cat['id'] ?>"><?= $cat['title'] ?></a></li>
      <?php endwhile ?>
        </ul>
        
    </div><!--category-footer-->
   
</section><!--section title category-->
<?php
include('partials/footer.php');
?>