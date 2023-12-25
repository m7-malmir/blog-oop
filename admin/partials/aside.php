<?php  
    $users2   = 'users';
    $category='categories';
    $post='posts';
      if (str_contains($query, $users2)) {
         $user_export='active';
     }elseif (str_contains($query, $category)) {
        $cat_export='active';
     }elseif(str_contains($query, $post)){
        $post_export='active';
     }
?>
            <aside> 
                <div class="sidebar">
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                     <h4>Add Post</h4>
                    </a>
                    <a href="index.php" class="<?= $post_export ?? null ?>"><i class="uil uil-postcard"></i>
                     <h4>Manage Post</h4>
                    </a>
                    <?php if (isset($_SESSION['user_is_admin'])): ?>
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                     <h4>Add Users</h4>
                    </a>
                    <a href="manage-users.php" class="<?= $user_export ?? null ?>"><i class="uil uil-users-alt"></i>
                     <h4>Manage Users</h4>
                    </a>
                    <a href="add-category.php"><i class="uil uil-edit"></i>
                     <h4>Add Category</h4>
                    </a>
                    <a href="manage-categories.php" class="<?= $cat_export ?? null ?>"><i class="uil uil-list-ul"></i>
                     <h4>Manage Category</h4>
                    </a>
                    <?php endif ?>
                </div><!--sidebar-->
            </aside>