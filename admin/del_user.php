<?php
    require_once("actions/config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    if(isset($_GET['id'])){
        try{
            $uid = $_GET['id'];
            is_numeric($uid) ? "do nothing":die("user id is wrong");
            $query = "DELETE FROM users WHERE sr_no = $uid";
            $result = mysqli_query($conn,$query);
            if($result){
                //data deleted successfully.
                header("Location: users.php");
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