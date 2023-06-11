<?php
    require_once("config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    if($_SESSION["role"] != 0){
        header("Location: index.php");
    }
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['uid'])){
        try{
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $uname = trim($_POST['uname']);
            $password = md5($_POST['password']);
            $role = trim($_POST['role']);
            $uid = $_POST['uid'];
            is_numeric($uid) ? "do nothing":die("user id is wrong");
            in_array($role,[0,1]) ? "do nothing":die("user role is wrong");

            //first we need to check user already exist or not |
            $first_result = mysqli_query($conn,"SELECT * FROM users WHERE uname = '$uname'");
            if(mysqli_num_rows($first_result) == 1){
                die("<h1>username is already exists please choose another one.</h1>");
            }else{
                $query = "UPDATE users SET fname = '$fname',lname = '$lname',uname = '$uname',password = '$password',role = $role,date = '$cur_date' WHERE sr_no = $uid";
                $result = mysqli_query($conn,$query);
                if($result){
                    //data updated successfully.
                    header("Location: ../users.php");
                }else{
                    die("something is wrong");
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