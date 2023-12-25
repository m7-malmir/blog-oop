<?php
include 'partials/header.php';

//fetch categories from database 
$query="select * from categories";
$categories=mysqli_query($mysqli,$query);
?>


    <section class="dashboord">
     

    <div class="dashboord__container"> 
    
        <div class="left">
        <?php
            include 'partials/aside.php';
        ?>
        </div><!--left-->
        <div class="right">


<?php if(isset($_SESSION['edit-category-success'])) : ?>
    <div class="container">
<p class="su-alert">
<?= $_SESSION['edit-category-success'];
unset($_SESSION['edit-category-success']);
?>
</p>
<?php elseif(isset($_SESSION['edit-category'])) : ?>
    <p class="alert">
<?= $_SESSION['edit-category'];
unset($_SESSION['edit-category']);
?>
</p>
<?php elseif(isset($_SESSION['delete-category-success'])) : ?>
    <p class="su-alert">
<?= $_SESSION['delete-category-success'];
unset($_SESSION['delete-category-success']);
?>
</p>
<?php elseif(isset($_SESSION['add-category-success'])) : ?>
    <p class="su-alert">
<?= $_SESSION['add-category-success'];
unset($_SESSION['add-category-success']);
?>
</p>
</div>
<?php endif ?>

            <div class="recent-orders">
                <h3>Manage Categories</h3>
                <?php if(mysqli_num_rows($categories) > 0) : ?>
                <table>
                    <thead>
                      <tr>
                        <th>title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                      </tr>
                     </thead>
                     <tbody>
                        <?php while ($category=mysqli_fetch_assoc($categories)) :?>
                        <tr>
                          <td><?= $category['title'] ?></td>
            <td> <a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id'] ?>" ><button class="btn-blog">edit<button></a></td>
            <td class="warning"><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id'] ?>"><button class="btn-danger">delete</button></a></td>
                         
                        </tr>
                            <?php endwhile ?>

                     </tbody>
                  </table>
                 <?php else : ?>
                    <p class="alert">no categories found</p>   
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