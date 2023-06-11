<?php require_once("parts/header.php"); ?>
    <div class="d-flex">
        <h1>Add user</h1>
    </div>
    <div class="login-box post-form">
        <form action="actions/add_user_action.php" method="post">
            <label>first name</label><br><br>
            <input class="input" name="fname" type="text"><br><br>
            <label>last name</label><br><br>
            <input class="input" name="lname" type="text"><br><br>
            <label>user name</label><br><br>
            <input class="input" name="uname" type="text"><br><br>
            <label>password</label><br><br>
            <input class="input" name="password" type="password"><br><br>
            <label>user role</label><br><br>
            <select name="role">
                <option value="1">normal user</option>
                <option value="0">admin</option>
            </select><br><br>
            <input type="submit" value="add" class="login">
        </form>
    </div>
<?php require_once("parts/footer.php"); ?>