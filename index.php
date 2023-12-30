<?php
include 'partials/header.php';
include 'classes/showProduct-contr.classes.php';

$newShow=new ShowProductContr;
$posts=$newShow->showProduct();
?>
<?php //if(mysqli_num_rows($f_result)==1) :?>
<header>
    <div class="container header__container">
        <div class="header__right">
            <div class="header__right-image">
                <img src="./img/<?= $featured['thumbnail'] ?>" alt="">
            </div><!--header__right-image-->
        </div><!--header__right-->

        <div class="header__left">
            <div class="category__title">
              <?php
              // $category_id=$featured['category_id'];
              // $category_q="SELECT * FROM `categories` WHERE `id`=$category_id";
              // $c_result=mysqli_query($mysqli, $category_q);
              // $category=mysqli_fetch_assoc($c_result);
              // $cat_title=$category['title'];
              ?>
                <a href="<?php //ROOT_URL ?>category-posts.php?id=<?= $featured['category_id'] ?>" class=""><?php //$cat_title ?></a>
            </div>
              <a href="<?php //ROOT_URL ?>post.php?id=<?php //$featured['id'] ?>">
                <h4><?php //$featured['title'] ?></h4>
                <p class="text-muted">
                <?php //substr($featured['body'], 0,300)  ?>...
                </p>
              </a>
            <div class="user">
                <div class="profile-picture">
                  <?php 
                  //  $user_id=$featured['author_id'];
                  //  $user_q="SELECT * FROM `users` WHERE `id`=$user_id";
                  //  $c_result=mysqli_query($mysqli, $user_q);
                  //  $user=mysqli_fetch_assoc($c_result);
                  //  $f_name=$user['firstname'];
                  //  $l_name=$user['lastname'];
                  //  $avatar=$user['avatar'];
                  ?>
                  <img src="./img/<?php //$avatar ?>" alt="">
                </div>
                <div class="ingo">
                  <h5>By: <?php //"{$f_name} {$l_name}" ?></h5>
                  <small><?php //date("M d, Y - H:i",strtotime($featured['date_time'])) ?></small>
                </div>
            </div>
        </div><!--header__left-->
            
        
    </div><!--container header__container-->
</header><!--end of header-->
<?php //endif ?>
<section class="container content__container">
<?php //while($post = mysqli_fetch_assoc($r_post)) : ?>
    <div class="other_posts">

        <div class="header__right-image">
            <img src="./img/<?= $post['thumbnail'] ?>" alt="">
        </div><!--header__right-image-->
        <?php
              // $category_id=$post['category_id'];
              // $category_q="SELECT * FROM `categories` WHERE `id`=$category_id";
              // $c_result=mysqli_query($mysqli, $category_q);
              // $category=mysqli_fetch_assoc($c_result);
              // $cat_title=$category['title'];
              ?>
          <div class="category__title">
            <a href="category-posts.php?id=<?php //$post['category_id'] ?>" class=""><?php //$cat_title ?></a>
        </div>
        <a href="<?php //ROOT_URL ?>post.php?id=<?php //$post['id'] ?>">
        <h4><?php //$post['title'] ?></h4>
        <p class="text-muted">
        <?php  //substr($post['body'], 0,150)  ?>...
        </p>
        </a>
        <?php
        // $user_id=$post['author_id'];
        //            $user_q="SELECT * FROM `users` WHERE `id`=$user_id";
        //            $c_result=mysqli_query($mysqli, $user_q);
        //            $user=mysqli_fetch_assoc($c_result);
        //            $f_name=$user['firstname'];
        //            $l_name=$user['lastname'];
        //            $avatar=$user['avatar'];
        ?>
        <div class="user">
            <div class="profile-picture">
               <img src="./img/<?php //$avatar ?>" alt="">
                </div>
                <div class="ingo">
                  <h5>By: <?php //"{$f_name} {$l_name}" ?></h5>
                  <small><?php //date("M d, Y - H:i",strtotime($post['date_time'])) ?></small>
            </div>
          
          </div>

    </div><!--other_posts-->

<?php //endwhile ?>
</section><!--container content__container-->


<?php
include('partials/footer.php');
?>