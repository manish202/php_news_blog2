<?php
    require_once("parts/header.php");
    $result2 = mysqli_query($conn,"SELECT * FROM posts WHERE sr_no = $pid");
    if(mysqli_num_rows($result2) != 1){
        header("Location: index.php");
    }
    $data = mysqli_fetch_assoc($result2);
    $date = date_format(date_create($data['date']),"d-M-Y");
?>
<div class="blog-container">
    <div class="blogs single-page">
        <h1><?php echo $data['title']; ?></h1>
        <div class='blog-cat'>
            <a href='category.php?id=<?php echo $data['cat'].'&cat='.$cat_name; ?>'><i class='fa-solid fa-tag'></i> <?php echo $cat_name; ?></a>
            <a href='author.php?id=<?php echo $data['author'].'&author='.$author_name; ?>'><i class='fa-solid fa-user'></i> <?php echo $author_name; ?></a>
            <span><i class='fa-solid fa-calendar-days'></i> <?php echo $date; ?></span>
        </div>
        <img src="images/<?php echo $data['image']; ?>" alt="<?php echo $data['title']; ?>">
        <p><?php echo $data['description']; ?></p>
    </div>
    <?php require_once("parts/sidebar.php"); ?>
</div>
<?php require_once("parts/footer.php"); ?>