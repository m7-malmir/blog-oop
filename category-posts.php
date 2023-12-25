<?php
include 'partials/header.php';
if(isset($_GET['id'])){
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query="select * from categories where id=$id";
  $res=mysqli_query($mysqli,$query);
  $post=mysqli_fetch_assoc($res);
}else{
  header('location: '.ROOT_URL.'index.php');
  die();
}


$post_q="SELECT * FROM `posts` where category_id=$id";
$r_post=mysqli_query($mysqli,$post_q);
?>
<section>
    <div class=" category-post__container">
       
        <h1><?= $post['title'] ?></h1>
    </div><!-- category-post__container-->
</sec><!--end of section-->
<section class="container content__container">
<?php while($post = mysqli_fetch_assoc($r_post)) : ?>
    <div class="other_posts">

        <div class="header__right-image">
            <img src="./img/<?= $post['thumbnail'] ?>" alt="">
        </div><!--header__right-image-->
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