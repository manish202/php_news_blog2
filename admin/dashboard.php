<?php require_once("parts/header.php"); ?>
    <div class="d-flex">
        <h1>All Posts</h1>
        <a href="add_post.php" class="btn-black">add post</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>image</th>
                <th>title</th>
                <th>description</th>
                <th>date</th>
                <th>category</th>
                <th>author</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $star = "posts.sr_no as pid, posts.image as image, posts.title as title, posts.description as description, posts.date as pdate, posts.cat as cat, posts.author as author, category.sr_no as cid, category.cat_name as cat_name, users.sr_no as uid, users.fname as fname, users.lname as lname";
            if($_SESSION['role'] == 0){
                $query = "SELECT $star FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no ORDER BY posts.sr_no DESC LIMIT $offset,$global_limit";
            }else{
                $author2 = $_SESSION['sr_no'];
                $query = "SELECT $star FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no WHERE posts.author = $author2 ORDER BY posts.sr_no DESC LIMIT $offset,$global_limit";
            }
            $result = mysqli_query($conn,$query);
            $total_rows = mysqli_num_rows($result);
            if($total_rows > 0){
                while($data = mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <td>{$data['pid']}</td>
                    <td><img src='../images/{$data['image']}' alt='{$data['title']}'></td>
                    <td>".substr($data['title'],0,40)."...</td>
                    <td>".substr($data['description'],0,40)."...</td>
                    <td>{$data['pdate']}</td>
                    <td>{$data['cat_name']}</td>
                    <td>{$data['fname']} {$data['lname']}</td>
                    <td>
                        <a class='btn-green' href='edit_post.php?id={$data['pid']}'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a class='btn-red' href='del_post.php?id={$data['pid']}'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }else{
                echo "<tr><td colspan='8'>no posts found</td></tr>";
            }
            if($_SESSION['role'] == 0){
                $pagi_query = "SELECT COUNT(*) as total FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no";
            }else{
                $author = $_SESSION['sr_no'];
                $pagi_query = "SELECT COUNT(*) as total FROM posts JOIN category ON posts.cat = category.sr_no JOIN users ON posts.author = users.sr_no WHERE posts.author = $author";
            }
            $result2 = mysqli_query($conn,$pagi_query);
            $info = mysqli_fetch_assoc($result2);
            $total_records = $info['total'];
            $total_pages = ceil($total_records/$global_limit);
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='8'>
                <div class='pagination'>
                    <?php
                        if($page > 1){
                            echo "<a href='dashboard.php?page=".($page-1)."'>prev</a>";
                        }
                        for($i=1;$i<=$total_pages;$i++){
                            $active = $page == $i ? "active":"";
                            echo "<a href='dashboard.php?page=$i' class='$active'>$i</a>";
                        }
                        if($page < $total_pages){
                            echo "<a href='dashboard.php?page=".($page+1)."'>next</a>";
                        }
                    ?>
                </div>
                </td>
            </tr>
        </tfoot>
    </table>
<?php require_once("parts/footer.php"); ?>