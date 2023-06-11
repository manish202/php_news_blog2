<?php require_once("parts/header.php"); ?>
    <div class="d-flex">
        <h1>All Users</h1>
        <a href="add_user.php" class="btn-black">add user</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>full name</th>
                <th>username</th>
                <th>role</th>
                <th>date</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //0 means admin & 1 means normal user
            $query = "SELECT * FROM users ORDER BY sr_no DESC LIMIT $offset,$global_limit";
            $result = mysqli_query($conn,$query);
            $total_rows = mysqli_num_rows($result);
            if($total_rows > 0){
                while($data = mysqli_fetch_assoc($result)){
                    $user = $data['role'] == 0 ? "admin":"normal user";
                    echo "<tr>
                    <td>{$data['sr_no']}</td>
                    <td>{$data['fname']} {$data['lname']}</td>
                    <td>{$data['uname']}</td>
                    <td>$user</td>
                    <td>{$data['date']}</td>
                    <td>
                        <a class='btn-green' href='edit_user.php?id={$data['sr_no']}'><i class='fa-solid fa-pen-to-square'></i></a>
                        <a class='btn-red' href='del_user.php?id={$data['sr_no']}'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>";
                }
            }else{
                echo "<tr><td colspan='6'>no users found</td></tr>";
            }

            $pagi_query = "SELECT COUNT(*) as total FROM users";
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
                            echo "<a href='users.php?page=".($page-1)."'>prev</a>";
                        }
                        for($i=1;$i<=$total_pages;$i++){
                            $active = $page == $i ? "active":"";
                            echo "<a href='users.php?page=$i' class='$active'>$i</a>";
                        }
                        if($page < $total_pages){
                            echo "<a href='users.php?page=".($page+1)."'>next</a>";
                        }
                    ?>
                </div>
                </td>
            </tr>
        </tfoot>
    </table>
<?php require_once("parts/footer.php"); ?>