        <aside>
            <div class="search-box">
                <h1 class="head-title">search</h1>
                <form action="search.php">
                    <input type="text" name="search" placeholder="search">
                    <input type="submit" value="search">
                </form>
            </div>
            <div class="recent-posts">
                <h1 class="head-title">recent posts</h1>
                <?php
                    $star2 = "posts.sr_no as pid, posts.image as image, posts.title as title, posts.date as pdate, posts.cat as cat, category.sr_no as cid, category.cat_name as cat_name, users.sr_no as uid, users.fname as fname";
                    $post_query2 = "SELECT $star2 FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no ORDER BY posts.sr_no DESC LIMIT 0,5";
                    $result4 = mysqli_query($conn,$post_query2);
                    if(mysqli_num_rows($result4) > 0){
                        while($data4 = mysqli_fetch_assoc($result4)){
                            echo smallCard($data4);
                        }
                    }else{
                        echo "<h1>no recent posts found</h1>";
                    }
                ?>
            </div>
        </aside>