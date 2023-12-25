<?php
include 'partials/header.php';

if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query="select * from categories where id=$id";
    $result=mysqli_query($mysqli,$query);
    if(mysqli_num_rows($result)==1){
        $category=mysqli_fetch_assoc($result);
    }

}else{
    header('location:'.ROOT_URL.'admin/manage-categories.php');
    die();
}

?>
<section class="sign-in">
<div class="container">
    
        <?php if(isset($_SESSION['edit-category'])) : ?>
            <p class="alert">
        <?= $_SESSION['edit-category'];
        unset($_SESSION['edit-category']);
        ?>
        </p>
       <?php endif ?>
    </div>
    <div class="container-login">
        <h3>Edit Category</h3>
        <form action="<?= ROOT_URL ?>admin/edit-category-logic.php" method="post">
        <input type="hidden" name="id" value="<?= $category['id'] ?>" >
        <input type="text" value="<?= $category['title'] ?>" name="title" ><br/>
        <textarea rows="4" value="<?= $category['description'] ?>" name="description" cols="50" ></textarea><br/>
        <input type="submit" name="submit" value="Update Category"><br/>
        </form>
    </div>
</section>

<textarea rows="4" cols="50" placeholder="Description">
</textarea><br/>
<?php
include('../partials/footer.php');
?>
