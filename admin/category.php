<?php require_once("parts/header.php"); ?>
    <div class="d-flex">
        <h1>All categories</h1>
        <a href="add_category.php" class="btn-black">add category</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>name</th>
                <th>post under category</th>
                <th>date modify</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM category ORDER BY date_modify DESC LIMIT $offset,$global_limit";
            $result = mysqli_query($conn,$query);
            $total_rows = mysqli_num_rows($result);
            if($total_rows > 0){
                while($data = mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <td>{$data['sr_no']}</td>
                    <td>{$data['cat_name']}</td>
                    <td>{$data['post_under_cat']}</td>
                    <td>{$data['date_modify']}</td>
                    <td>
                        <a class='btn-green' href='edit_category.php?id={$data['sr_no']}&cat_name={$data['cat_name']}'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a class='btn-red' href='del_category.php?id={$data['sr_no']}'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }else{
                echo "<tr><td colspan='5'>no categories found</td></tr>";
            }

            $pagi_query = "SELECT COUNT(*) as total FROM category";
            $result2 = mysqli_query($conn,$pagi_query);
            $info = mysqli_fetch_assoc($result2);
            $total_records = $info['total'];
            $total_pages = ceil($total_records/$global_limit);
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan='5'>
                <div class='pagination'>
                    <?php
                        if($page > 1){
                            echo "<a href='category.php?page=".($page-1)."'>prev</a>";
                        }
                        for($i=1;$i<=$total_pages;$i++){
                            $active = $page == $i ? "active":"";
                            echo "<a href='category.php?page=$i' class='$active'>$i</a>";
                        }
                        if($page < $total_pages){
                            echo "<a href='category.php?page=".($page+1)."'>next</a>";
                        }
                    ?>
                </div>
                </td>
            </tr>
        </tfoot>
    </table>
<?php require_once("parts/footer.php"); ?>