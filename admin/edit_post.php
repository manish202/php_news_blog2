<?php require_once("parts/header.php"); ?>
    <div class="d-flex">
        <h1>Edit Post</h1>
        <a href="add_post.php" class="btn-black">add post</a>
    </div>
    <div class="login-box post-form">
        <form action="actions/edit_post_action.php" method="post" enctype="multipart/form-data">
            <label>title</label><br><br>
            <input class="input" name="title" type="text" value="<?php echo $title; ?>"><br><br>
            <label>description</label><br><br>
            <textarea name="description" cols="30" rows="10"><?php echo $desc; ?></textarea><br><br>
            <label>thumbnail</label><br><br>
            <input type="file" name="thumb"><br><br>
            <label>old image</label><br><br>
            <img src="../images/<?php echo $image; ?>" alt=""><br><br>
            <label>category</label><br><br>
            <select name="category">
            <?php
                $query2 = "SELECT * FROM category";
                $result2 = mysqli_query($conn,$query2);
                if(mysqli_num_rows($result2) > 0){
                    while($data2 = mysqli_fetch_assoc($result2)){
                        $selected = ($cat == $data2['sr_no']) ? "selected":"";
                        echo "<option $selected value='{$data2['sr_no']}'>{$data2['cat_name']} ({$data2['post_under_cat']})</option>";
                    }
                }else{
                    echo "<option selected disabled>no category found</option>";
                }
            ?>
            </select><br><br>
            <input type="hidden" name="old_img" value="<?php echo $image; ?>">
            <input type="hidden" name="old_cat" value="<?php echo $cat; ?>">
            <input type="hidden" name="post_id" value="<?php echo $id; ?>">
            <input type="submit" value="update" class="login">
        </form>
    </div>
<?php require_once("parts/footer.php"); ?>