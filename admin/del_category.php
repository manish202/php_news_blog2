<?php
    require_once("actions/config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    if(isset($_GET['id'])){
        try{
            $cid = $_GET['id'];
            is_numeric($cid) ? "do nothing":die("user id is wrong");
            $query = "DELETE FROM category WHERE sr_no = $cid";
            $result = mysqli_query($conn,$query);
            if($result){
                //data deleted successfully.
                header("Location: category.php");
            }else{
                die("something is wrong");
            }
        }catch(Exception $e){
            die($e->getMessage());
        }
    }else{
        die("id is missing");
    }
    mysqli_close($conn);
?>