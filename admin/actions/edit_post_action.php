<?php
    require_once("config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    function isValidImage(){
        $img_name = $_FILES['thumb']['name'];
        $img_size = $_FILES['thumb']['size'];
        $img_tmp_name = $_FILES['thumb']['tmp_name'];
        $img_ext = pathinfo($img_name,PATHINFO_EXTENSION);
        if(!in_array($img_ext,["png","jpg","jpeg"])){
            die("image extension ".$img_ext." is invalid");
        }elseif($img_size > 2097152){
            //validate file size max 2 mb
            //1024 byts = 1kb 1024kb = 1mb 2mb = 2097152 byts
            die("image size more then 2mb is invalid");
        }else{
            if(move_uploaded_file($img_tmp_name,"../../images/$img_name")){
                //new image is uploaded so delete old image
                unlink("../../images/".$_POST['old_img']);
                return true;
            }else{
                die("image uploading failed");
            }
        }
    }
    function doNextProcess($imgname){
        //image uploading completed so do next work here
        global $cur_date,$conn;
        $pid = $_POST['post_id'];
        $title = htmlentities(trim($_POST['title']));
        $desc = htmlentities(trim($_POST['description']));
        $cat = $_POST['category'];
        $old_cat = $_POST['old_cat'];

        if($_SESSION['role'] == 0){
            //admin can update anything
            $query = "UPDATE posts SET image = '$imgname', title = '$title', description = '$desc', date = '$cur_date', cat = '$cat' WHERE sr_no = $pid";
        }else{
            $author = $_SESSION['sr_no'];
            $query = "UPDATE posts SET image = '$imgname', title = '$title', description = '$desc', date = '$cur_date', cat = '$cat' WHERE sr_no = $pid && author = $author";
        }
        $result = mysqli_query($conn,$query);
        if($result){
            // data updated successfully.
            //if data updated successfully then we also need to check category is changed or not if its changed then we need to update category table.
            if($cat != $old_cat){
                // if both are not same then add +1 in new category and do -1 in old category (post under cat)
                $result2 = mysqli_multi_query($conn,"UPDATE category SET post_under_cat = post_under_cat - 1 WHERE sr_no = $old_cat;UPDATE category SET post_under_cat = post_under_cat + 1 WHERE sr_no = $cat");
                if($result2){
                    //everything looks good
                    header("Location: ../dashboard.php");
                }else{
                    die("data updated successfully but category table is not updated");
                }
            }else{
                //everything looks good
                header("Location: ../dashboard.php");
            }
        }else{
            die("something is wrong when data update");
        }
    }
    //admin can update post of any user but user can only update their own post
    //first check all required data is valid or not
    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['post_id']) && isset($_POST['old_img']) && isset($_POST['old_cat'])){
        try{
            //first need to check user uploaded new image or not
            if(!empty($_FILES['thumb']['name'])){
                //means user uploaded new image
                if(isValidImage()){
                    doNextProcess($_FILES['thumb']['name']);
                }
            }else{
                //user not uploaded new image so we need to update old image in database
                doNextProcess($_POST['old_img']);
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }else{
        die("some data is missing");
    }
    mysqli_close($conn);
?>