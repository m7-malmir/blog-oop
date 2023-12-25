<?php
include 'partials/header.php';
if(isset($_GET['id'])){
    $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    $query="select * from users where id=$id";
    $result=mysqli_query($mysqli,$query);
    $user=mysqli_fetch_assoc($result);
}else{
    header('location:'.ROOT_URL.'admin/manage-users.php');
    die();
}
?>

<section class="sign-in">
    <div class="container-login">
        <h3>Edit User</h3>
        <?php if(isset($_SESSION['edit-user'])) : ?>
        <p class="alert">
        <?= $_SESSION['edit-user'];
        unset($_SESSION['edit-user']);
        ?>
        </p>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>" >
        <input type="text" name="fname" value="<?= $user['firstname'] ?>" placeholder="First name"><br/>
        <input type="text" value="<?= $user['lastname'] ?>" name="lname" placeholder="Lastname"><br/>
        <p for="role"> User Role</p>
        <select name="userrole">
            <option>choose admin or author</option>
            <option value="1">Admin</option>
            <option value="0">Author</option>
           
        </select>
      
        <input type="submit" name="submit" value="Update User"><br/>
        </form>
    </div>
</section>
<?php
include('../partials/footer.php');
?>