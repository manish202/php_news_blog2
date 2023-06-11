<?php
    //create connection with database
    try{
        $conn = mysqli_connect("localhost","root","","news_blog");
    }catch(Exception $e){
        die($e->getMessage());
    }
    date_default_timezone_set("asia/calcutta");
    $cur_date = date("Y-m-d h:i:s");
    $cur_file = pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
    session_start();
?>