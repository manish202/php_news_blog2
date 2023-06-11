<?php
    require_once("config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['category']) && isset($_FILES['thumb']['name'])){
        try{
            $author = $_SESSION['sr_no'];
            $title = htmlentities(trim($_POST['title']));
            $desc = htmlentities(trim($_POST['description']));
            $cat = trim($_POST['category']);
            $img_name = $_FILES['thumb']['name'];
            $img_size = $_FILES['thumb']['size'];
            $img_type = $_FILES['thumb']['type'];
            $img_tmp_name = $_FILES['thumb']['tmp_name'];
            $img_ext = pathinfo($img_name,PATHINFO_EXTENSION);
            //lets first upload image on server
            //first validate file extension
            if(!in_array($img_ext,["png","jpg","jpeg"])){
                die("image extension ".$img_ext." is invalid");
            }elseif($img_size > 2097152){
                //validate file size max 2 mb
                //1024 byts = 1kb 1024kb = 1mb 2mb = 2097152 byts
                die("image size more then 2mb is invalid");
            }else{
                if(move_uploaded_file($img_tmp_name,"../../images/$img_name")){
                    $query = "INSERT INTO posts(image,title,description,date,cat,author) VALUES('$img_name' ,'$title' ,'$desc' ,'$cur_date' ,$cat ,$author)";
                    $result = mysqli_query($conn,$query);
                    if($result){
                        //data inserted successfully.
                        $query2 = "UPDATE category SET post_under_cat = post_under_cat + 1 WHERE sr_no = $cat";
                        $result2 = mysqli_query($conn,$query2);
                        if($result2){
                            header("Location: ../dashboard.php");
                        }else{
                            die("post added successfully but category count not updated in category table");
                        }
                    }else{
                        die("something is wrong");
                    }
                }else{
                    die("image uploading failed");
                }
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }else{
        die("some data is missing");
    }
    mysqli_close($conn);
?>