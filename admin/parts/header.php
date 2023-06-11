<?php
    require_once("actions/config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    if($cur_file == "edit_user"){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            header("Location: users.php");
        }
    }
    if($cur_file == "edit_category"){
        if(!isset($_GET['id']) || !is_numeric($_GET['id']) || !isset($_GET['cat_name'])){
            header("Location: category.php");
        }
    }
    if($_SESSION["role"] == 1){
        if($cur_file == "category" || $cur_file == "users" || $cur_file == "add_category" || $cur_file == "edit_category" || $cur_file == "del_category" || $cur_file == "add_user" || $cur_file == "edit_user" || $cur_file == "del_user"){
            header("Location: dashboard.php");
        }
    }
    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        // used abs method because if user paas negative number
        $page = abs($_GET['page']);
    }else{
        $page = 1;
    }
    $global_limit = 5;
    $offset = ($page - 1)*$global_limit;
    if($cur_file == "edit_post"){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            header("Location: dashboard.php");
        }
        $id = $_GET['id'];
        //admin can do anything but normal user can see, update, delete their own post so here i need to write logic
        if($_SESSION['role'] == 0){
            $query = "SELECT * FROM posts WHERE sr_no = $id";
        }else{
            $author = $_SESSION['sr_no'];
            $query = "SELECT * FROM posts WHERE sr_no = $id && author = $author";
        }
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
            $data = mysqli_fetch_assoc($result);
            $image = $data['image'];
            $title = $data['title'];
            $desc = $data['description'];
            $date = $data['date'];
            $cat = $data['cat'];
            $author = $data['author'];
        }else{
            header("Location: dashboard.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="color.css">
</head>
<body>
    <div class="logo">
        <a href="index.php">news blog</a>
        <h1>
            <?php
                echo isset($_SESSION["full_name"]) ? "Hii! ".$_SESSION["full_name"]:"pls login";
            ?>
        </h1>
        <a href="logout.php">LOGOUT</a>
    </div>
    <div class="menu">
        <ul>
            <?php
                $tmp_arr = [
                    "dashboard" => "POST",
                    "category" => "CATEGORY",
                    "users" => "USERS"
                ];
                if($_SESSION['role'] == 1){
                    $tmp_arr = ["dashboard" => "POST"];
                }
                foreach($tmp_arr as $key=>$val){
                    $active = $cur_file == $key ? "active":"";
                    echo "<li class='$active'><a href='$key.php'>$val</a></li>";
                }
            ?>
        </ul>
    </div>