<?php
include 'partials/header.php';
$query="select * from categories";
$categories=mysqli_query($mysqli,$query);

//fetch post data from database if ID is set
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $_SESSION['post_id']=$id;
    $query="select * from posts where id=$id";
    $res=mysqli_query($mysqli,$query);
    $post=mysqli_fetch_assoc($res);
}else{
    header('location:' .ROOT_URL. 'admin/');
    die();
}

?>
<section class="sign-in">
    <div class="container-login">
    <?php if(isset($_SESSION['edit-post'])) : ?>
        <p class="alert">
    <?= $_SESSION['edit-post'];
    unset($_SESSION['edit-post']);
    ?>
    </p>
    <?php endif ?>
        <h3>Edit Post</h3>
        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
        <input type="text" value="<?= $post['title'] ?>" name="title" placeholder="title"><br/>
        <select name="category">
            <?php while($category=mysqli_fetch_assoc($categories)) : ?>
            <option value="<?= $category['id'] ?>" ><?= $category['title'] ?></option>
                <?php endwhile ?>
        </select>
        <textarea rows="4" name="body" cols="50" placeholder="Description"><?= $post['body'] ?></textarea><br/>
        <input type="checkbox" name="is_featured" value="1" checked>
        <label for="is_featured">Featured</label><br>
        <p>Change Thumbnail</p>
        <input type="file" name="thumbnail"><br/>
        <input type="submit" name="submit" value="Update post"><br/> 
        </form>
    </div>
</section>

<?php
include('../partials/footer.php');
?>