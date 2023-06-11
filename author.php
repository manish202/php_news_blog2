<?php
    require_once("parts/header.php");
?>
    <h1 class="head-title s-page">author : <?php echo $author_name; ?></h1>
    <div class="blog-container">
        <div class="blogs">
            <?php
                $star = "posts.sr_no as pid, posts.image as image, posts.title as title, posts.description as description, posts.date as pdate, posts.cat as cat, posts.author as author, category.sr_no as cid, category.cat_name as cat_name, users.sr_no as uid, users.fname as fname";
                $post_query = "SELECT $star FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no WHERE users.sr_no = $uid ORDER BY posts.sr_no DESC LIMIT $offset,$global_limit";
                $result2 = mysqli_query($conn,$post_query);
                $total_rows = mysqli_num_rows($result2);
                if($total_rows > 0){
                    while($data2 = mysqli_fetch_assoc($result2)){
                        echo bigCard($data2);
                    }
                }else{
                    echo "<h1>no posts found</h1>";
                }
            ?>
            <div class="pagination">
                <?php
                    $post_pagi_query = "SELECT COUNT(*) as total FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no WHERE users.sr_no = $uid";
                    $result3 = mysqli_query($conn,$post_pagi_query);
                    $info = mysqli_fetch_assoc($result3);
                    $total_records = $info['total'];
                    $total_pages = ceil($total_records/$global_limit);
                    if($page > 1){
                        echo "<a href='author.php?id=$uid&author=$author_name&page=".($page-1)."'>prev</a>";
                    }
                    for($i=1;$i<=$total_pages;$i++){
                        $active = $page == $i ? "active":"";
                        echo "<a href='author.php?id=$uid&author=$author_name&page=$i' class='$active'>$i</a>";
                    }
                    if($page < $total_pages){
                        echo "<a href='author.php?id=$uid&author=$author_name&page=".($page+1)."'>next</a>";
                    }
                ?>
            </div>
        </div>
        <?php require_once("parts/sidebar.php"); ?>
    </div>
<?php require_once("parts/footer.php"); ?>