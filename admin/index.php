<?php

require 'partials/header.php';
 
$current_user_id=$_SESSION['user_id'];

$query="select id, title, category_id from posts where author_id=$current_user_id order by id desc";
$posts=mysqli_query($mysqli,$query);

?>

<section class="dashboord">
    
    <div class="dashboord__container"> 
        <div class="left">
                    
        <?php
        include 'partials/aside.php';
        ?>
        </div><!--left-->
        <div class="right">

<?php if(isset($_SESSION['add-post-success'])) : ?>
    <div class="container">  
    <p class="su-alert">
    <?= $_SESSION['add-post-success'];
    unset($_SESSION['add-post-success']);
    ?>
    </p>
    <?php elseif(isset($_SESSION['edit-post-success'])) : ?>
        <p class="su-alert">
    <?= $_SESSION['edit-post-success'];
    unset($_SESSION['edit-post-success']);
    ?>
    </p>
    <?php elseif(isset($_SESSION['delete-post-su'])) : ?>
        <p class="su-alert">
    <?= $_SESSION['delete-post-su'];
    unset($_SESSION['delete-post-su']);
    ?>
    </p>
    </div>
    <?php endif ?>

            <div class="recent-orders">
                <h3>Manage Posts</h3>
                <?php 
                $query1="SELECT * FROM `posts` where author_id=$current_user_id";
                $users=mysqli_query($mysqli,$query1);
                if(mysqli_num_rows($users) > 0) : ?>
                <table>
                    <thead>
                      <tr>
                        <th>title</th>
                        <th>category</th>
                        <th>Edit</th>
                        <th>Delete</th>  
                      </tr>
                     </thead>
                     <tbody>
                        <?php while($post=mysqli_fetch_assoc($posts)) : ?>
                            <?php
                                $category_id=$post['category_id'];
                                $cat_query="select title from categories where id=$category_id";
                                $cat_res=mysqli_query($mysqli,$cat_query);
                                $category=mysqli_fetch_assoc($cat_res);
                            ?>
                        <tr>
                            <td><?= $post['title'] ?></td>
                            <td><?= $category['title'] ?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" ><button class="btn-blog">edit</button></a></td>
                            <td class="warning"><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" ><button class="btn-danger">delete</button></a></td>
                            
                        </tr>
                        <?php endwhile ?>
                     </tbody>
                </table>
                 <?php else : ?>
                    <p class="alert">no post found </p>
                    <?php endif ?>
                  
            </div><!--recent-order-->
            <div class="pagination">
                <i class="uil uil-angle-left"></i>
                <a href="">1</a><a href="">2</a><a href="">3</a>
                <i class="uil uil-angle-right"></i>
              </div><!--pagination-->
        </div><!--right-->
</div>
</section>
<?php
include('../partials/footer.php');
?>