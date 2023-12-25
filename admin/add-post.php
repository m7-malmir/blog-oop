<?php
include 'partials/header.php';
$query="select * from categories";
$cat=mysqli_query($mysqli,$query);
?>
<section class="sign-in"> 
    <div class="container-login">
        <h3>Add Post</h3>
        <?php if (isset($_SESSION['add-post'])) : ?>
          <p class="alert">
            <?= 
                $_SESSION['add-post']; 
                unset($_SESSION['add-post']);
            ?>
          </p>
          <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="post">
        <input type="text" name="title" placeholder="title"><br/>
        <select name="category">
            <?php while($category=mysqli_fetch_assoc($cat)) : ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
           <?php endwhile ?>
        </select>
        <textarea rows="4" cols="50" name="body" placeholder="body"></textarea><br/>
    <?php if(isset($_SESSION['user_is_admin'])) : ?>
        <input type="checkbox" name="is_featured" id="is_featured" value="1" checked>
        <label for="is_featured">Featured</label><br>
    <?php endif ?>
        <p>Add Thumbnail</p>
        <input type="file" name="thumbnail" id="thumbnail"><br/>
        <input type="submit" name="submit" value="Add Post"><br/>   
        </form> 
    </div>
</section>
<?php
include('../partials/footer.php');
?>