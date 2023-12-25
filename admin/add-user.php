<?php
    include 'partials/header.php';

$fname=$_SESSION['signup-data']['firstname'] ?? null;
$lname=$_SESSION['signup-data']['lastname'] ?? null;
$uname=$_SESSION['signup-data']['username'] ?? null;
$email=$_SESSION['signup-data']['email'] ?? null;
$cpass=$_SESSION['signup-data']['createpassword'] ?? null;
$vpass=$_SESSION['signup-data']['confirmpassword'] ?? null;
$userrole=$_SESSION['signup-data']['userrole'] ?? null;

unset($_SESSION['add-user-data']);
?>

<section class="sign-in">
    <div class="container-login">
        <h3>Add User</h3>
        <?php if(isset($_SESSION['add-user'])) : ?>
        <p class="alert">
            <?= $_SESSION['add-user'];
            unset($_SESSION['add-user']);
            ?>
        </p>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
        <input type="text" value="<?= $fname ?>" name="firstname" placeholder="First name"><br/>
            <input type="text" value="<?= $lname ?>" name="lastname" placeholder="Last name"><br/>
            <input type="text" value="<?= $uname ?>" name="username" placeholder="Username"><br/>
            <input type="email" value="<?= $email ?>" name="email" placeholder="email"><br/>
            <input type="password" value="<?= $cpass ?>" name="createpassword" placeholder="Create Password"><br/>
            <input type="password" value="<?= $cpass ?>" name="confirmpassword" placeholder="Confirm password"><br/>
            <p for="gender"> User Role</p>
            <select name="userrole" value="<?= $userrole ?>">
                <option value="0" selected>Author</option>
                <option value="1">Admin</option>
            </select>
            <p>User Avatar</p>
            <input name="avatar" type="file" id="avatar"><br/>
            <input type="submit" name="value" value="Add User"><br/>
        </form>
        
    </div>
</section>
<?php
include('../partials/footer.php');
?>