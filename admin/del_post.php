<?php
    require_once("actions/config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }

    //if user delete post then we also need to delete image from server and we also need to do -1 in that category (post under cat)
    //so for that we need to fetch data of that post based on given id
    if(isset($_GET['id'])){
        try{
            $id = $_GET['id'];
            is_numeric($id) ? "do nothing":die("post id is wrong");
            // admin can delete any post but normal user can delete only their own post
            if($_SESSION['role'] == 0){
                $query = "SELECT image,cat FROM posts WHERE sr_no = $id";
                $query2 = "DELETE FROM posts WHERE sr_no = $id";
            }else{
                $author = $_SESSION['sr_no'];
                $query = "SELECT image,cat FROM posts WHERE sr_no = $id && author = $author";
                $query2 = "DELETE FROM posts WHERE sr_no = $id && author = $author";
            }
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) == 1){
                $data = mysqli_fetch_assoc($result);
                // $data is array of that post now first we need to delete that post
                $result2 = mysqli_query($conn,$query2);
                if($result2){
                    //post deleted now delete that image from server
                    unlink("../images/".$data['image']);
                    //now we need to do -1 from category table
                    $result3 = mysqli_query($conn,"UPDATE category SET post_under_cat = post_under_cat - 1 WHERE sr_no = {$data['cat']}");
                    if($result3){
                        //everything looks good. post deleted, image deleted, category table updated
                        header("Location: dashboard.php");
                    }else{
                        die("post is deleted but category table is not updated");
                    }
                }else{
                    //post not deleted
                    die("something is wrong during deleting post");
                }
            }else{
                die("post does not exist");
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }else{
        die("id is missing or wrong.");
    }
    mysqli_close($conn);
?>