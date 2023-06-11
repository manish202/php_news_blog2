<?php
    require_once("parts/header.php");
    if(isset($_GET['cat_name']) && isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['my_logic'])){
        $cat_name = $_GET['cat_name'];
        $id = $_GET['id'];
        try{
            $query = "UPDATE category SET cat_name = '$cat_name',date_modify = '$cur_date' WHERE sr_no = $id";
            $result = mysqli_query($conn,$query);
            if($result){
                //data updated successfully.
                header("Location: category.php");
            }else{
                die("something is wrong");
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
?>
    <div class="d-flex">
        <h1>Edit category</h1>
        <a href="add_category.php" class="btn-black">add category</a>
    </div>
    <div class="login-box post-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>category name</label><br><br>
            <input type="hidden" name="my_logic" value="not important">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <input class="input" name="cat_name" type="text" value="<?php echo $_GET['cat_name']; ?>"><br><br>
            <input type="submit" value="update" class="login">
        </form>
    </div>
<?php require_once("parts/footer.php"); ?>