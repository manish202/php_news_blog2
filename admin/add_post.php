<?php require_once("parts/header.php"); ?>
    <div class="d-flex">
        <h1>Add Post</h1>
    </div>
    <div class="login-box post-form">
        <form action="actions/add_post_action.php" method="post" enctype="multipart/form-data">
            <label>title</label><br><br>
            <input class="input" name="title" type="text"><br><br>
            <label>description</label><br><br>
            <textarea name="description" cols="30" rows="10"></textarea><br><br>
            <label>thumbnail (only png,jpg,jpeg is valid max 2mb)</label><br><br>
            <input type="file" name="thumb"><br><br>
            <label>category</label><br><br>
            <select name="category">
            <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result) > 0){
                    echo "<option selected disabled>choose category</option>";
                    while($data = mysqli_fetch_assoc($result)){
                        echo "<option value='{$data['sr_no']}'>{$data['cat_name']} ({$data['post_under_cat']})</option>";
                    }
                }else{
                    echo "<option selected disabled>no category found</option>";
                }
            ?>
            </select><br><br>
            <input type="submit" value="add" class="login">
        </form>
    </div>
<?php require_once("parts/footer.php"); ?>