<?php
include 'partials/header.php';
//fetch users from database except current user
$current_admin_id=$_SESSION['user_id'];

$query="select * from users where not id=$current_admin_id and is_admin=0";
$users=mysqli_query($mysqli,$query);
?>


<section class="dashboord">
    <div class="dashboord__container"> 
        <div class="left">
        <?php
            include 'partials/aside.php';
        ?>
        </div><!--left-->
        <div class="right">
        
        <?php if(isset($_SESSION['edit-user-success'])) : ?>
            <div class="">
            <p class="su-alert">
        <?= $_SESSION['edit-user-success'];
        unset($_SESSION['edit-user-success']);
        ?>
        </p>
        <?php elseif(isset($_SESSION['add-user-success'])) : ?>
            <p class="su-alert">
        <?= $_SESSION['add-user-success'];
        unset($_SESSION['add-user-success']);
        ?>
        </p>
        <?php elseif(isset($_SESSION['edit-user'])) : ?>
            <p class="alert">
        <?= $_SESSION['edit-user'];
        unset($_SESSION['edit-user']);
        ?>
         </div>
        </p>
        <?php endif ?>

            <div class="recent-orders">
                <h3>Manage Users</h3>
                <?php if(mysqli_num_rows($users)>0) : ?>
                <table>
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>
                      </tr>
                     </thead>
                     <tbody>
                      <?php
                      while ($user=mysqli_fetch_assoc($users)) :?>
                        <tr>
                          <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                          <td><?= $user['username'] ?></td>
                          <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" ><button class="btn-blog">edit</button></a></td>
                          <td class="warning"><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>"><button class="btn-danger">delete</button></a></td>
                          <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                        </tr>
                        <?php endwhile ?>
                      </tbody>
                  </table>
                 <?php else : ?>
                  <p class="alert">user not found!!!</p>
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