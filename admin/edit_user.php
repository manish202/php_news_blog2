<?php
    require_once("parts/header.php");
    $query = "SELECT * FROM users WHERE sr_no = {$_GET['id']}";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    $fname = $data['fname'];
    $lname = $data['lname'];
    $uname = $data['uname'];
    $role = $data['role'];
?>
    <div class="d-flex">
        <h1>Edit user</h1>
        <a href="add_user.php" class="btn-black">add user</a>
    </div>
    <div class="login-box post-form">
        <form action="actions/edit_user_action.php" method="post">
            <input type="hidden" name="uid" value="<?php echo $_GET['id']; ?>">
            <label>first name</label><br><br>
            <input class="input" name="fname" type="text" value="<?php echo $fname; ?>"><br><br>
            <label>last name</label><br><br>
            <input class="input" name="lname" type="text" value="<?php echo $lname; ?>"><br><br>
            <label>user name</label><br><br>
            <input class="input" name="uname" type="text" value="<?php echo $uname; ?>"><br><br>
            <label>password</label><br><br>
            <input class="input" name="password" type="password"><br><br>
            <label>user role</label><br><br>
            <select name="role">
                <?php if($role == 0){echo "<option value='1'>normal user</option>
                <option value='0' selected>admin</option>";}else{echo "<option value='1' selected>normal user</option>
                    <option value='0'>admin</option>";} ?>
            </select><br><br>
            <input type="submit" value="update" class="login">
        </form>
    </div>
<?php require_once("parts/footer.php"); ?>