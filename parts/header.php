<?php
    require_once("admin/actions/config.php");
    $cid = 0;
    if($cur_file == "category"){
        if(!isset($_GET['id']) || !is_numeric($_GET['id']) || empty($_GET['cat'])){
            header("Location: index.php");
        }
        $cid = $_GET['id'];
        $cat_name = $_GET['cat'];
    }
    if($cur_file == "single"){
        if(!isset($_GET['id']) || !is_numeric($_GET['id']) || empty($_GET['cat']) || empty($_GET['author'])){
            header("Location: index.php");
        }
        $pid = $_GET['id'];
        $cat_name = $_GET['cat'];
        $author_name = $_GET['author'];
    }
    if($cur_file == "author"){
        if(!isset($_GET['id']) || !is_numeric($_GET['id']) || empty($_GET['author'])){
            header("Location: index.php");
        }
        $uid = $_GET['id'];
        $author_name = $_GET['author'];
    }
    if($cur_file == "search"){
        if(empty($_GET['search'])){
            header("Location: index.php");
        }
        $search_term = trim($_GET['search']);
    }
    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        // used abs method because if user paas negative number
        $page = abs($_GET['page']);
    }else{
        $page = 1;
    }
    $global_limit = 5;
    $offset = ($page - 1)*$global_limit;
    function bigCard($post_info){
        $date = date_format(date_create($post_info['pdate']),"d-M-Y");
        $single = "single.php?id={$post_info['pid']}&cat=".$post_info['cat_name']."&author=".$post_info['fname'];
        return "<div class='card'>
        <a href='$single'><img src='images/{$post_info['image']}' alt='{$post_info['title']}'></a>
        <div class='blog-data'>
            <a href='$single' class='blog-title'>".substr($post_info['title'],0,40)."..</a>
            <div class='blog-cat'>
                <a href='category.php?id={$post_info['cid']}&cat={$post_info['cat_name']}'><i class='fa-solid fa-tag'></i> {$post_info['cat_name']}</a>
                <a href='author.php?id={$post_info['uid']}&author={$post_info['fname']}'><i class='fa-solid fa-user'></i> {$post_info['fname']}</a>
                <span><i class='fa-solid fa-calendar-days'></i> $date</span>
            </div>
            <p>".substr($post_info['description'],0,60)."...</p>
            <a href='$single' class='read-more'>read more</a>
        </div>
    </div>";
    }

    function smallCard($post_info){
        $date = date_format(date_create($post_info['pdate']),"d-M-Y");
        $single = "single.php?id={$post_info['pid']}&cat=".$post_info['cat_name']."&author=".$post_info['fname'];
        return "<div class='small-card'>
        <div class='left'><a href='$single'><img src='images/{$post_info['image']}' alt='{$post_info['title']}'></a></div>
        <div class='right'>
            <a href='$single' class='blog-title'>".substr($post_info['title'],0,20)."..</a>
            <div class='blog-cat'>
                <a href='category.php?id={$post_info['cid']}&cat={$post_info['cat_name']}'><i class='fa-solid fa-tag'></i> {$post_info['cat_name']}</a>
                <span><i class='fa-solid fa-calendar-days'></i> $date</span>
            </div>
            <a href='$single' class='read-more'>read more</a>
        </div>
    </div>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </div>
    <div class="menu">
        <ul>
            <?php
                $result = mysqli_query($conn,"SELECT * FROM category WHERE post_under_cat > 0 ORDER BY post_under_cat DESC LIMIT 0,10");
                if(mysqli_num_rows($result) > 0){
                    while($data = mysqli_fetch_assoc($result)){
                        $active = ($cid == $data['sr_no']) ? "active":"";
                        echo "<li class='$active'><a href='category.php?id={$data['sr_no']}&cat={$data['cat_name']}'>{$data['cat_name']}</a></li>";
                    }
                }else{
                    echo "<li><a href='#'>no category</a></li>";
                }
            ?>
        </ul>
    </div>