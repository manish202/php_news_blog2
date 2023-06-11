<?php
    require_once("parts/header.php");
    if(isset($_POST['category_name'])){
        $cat_name = $_POST['category_name'];
        try{
            //first we need to check category already exist or not |
            $first_result = mysqli_query($conn,"SELECT * FROM category WHERE cat_name = '$cat_name'");
            if(mysqli_num_rows($first_result) == 1){
                die("<h1>category already exists</h1>");
            }else{
                $query = "INSERT INTO category(cat_name,date_modify) VALUES('$cat_name','$cur_date')";
                $result = mysqli_query($conn,$query);
                if($result){
                    //data inserted successfully.
                    header("Location: category.php");
                }else{
                    die("something is wrong");
                }
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
?>
    <div class="d-flex">
        <h1>Add category</h1>
    </div>
    <div class="login-box post-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>category name</label><br><br>
            <input class="input" name="category_name" type="text"><br><br>
            <input type="submit" value="add" class="login">
        </form>
    </div>
<?php require_once("parts/footer.php"); ?>