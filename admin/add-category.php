<?php
include 'partials/header.php';
?>
<div class="container">
    
    <?php if(isset($_SESSION['add-category'])) : ?>
        <p class="alert">
        <?= $_SESSION['add-category'];
        unset($_SESSION['add-category']);
        ?>
        </p>
        <?php endif ?>
    </div>
<section class="sign-in"> 
    <div class="container-login">
        <h3>Add Category</h3>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="post">
            <input type="text" name="title" placeholder="Title"><br/>
            <textarea rows="4" name="description" cols="50" placeholder="Description"></textarea><br/>
            <input type="submit" name="submit" value="Add Category"><br/>
        </form>
    </div>
</section>

<textarea rows="4" cols="50" placeholder="Description">
</textarea><br/>
<?php
include('../partials/footer.php');
?>
