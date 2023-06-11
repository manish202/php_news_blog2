<?php
    require_once("config.php");
    if(!isset($_SESSION['full_name']) || !isset($_SESSION["uname"]) || !isset($_SESSION["role"])){
        header("Location: index.php");
    }
    if($_SESSION["role"] != 0){
        header("Location: index.php");
    }
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['role'])){
        try{
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $uname = trim($_POST['uname']);
            $password = md5($_POST['password']);
            $role = trim($_POST['role']);
            in_array($role,[0,1]) ? "do nothing":die("user role is wrong");

            //first we need to check user already exist or not |
            $first_result = mysqli_query($conn,"SELECT * FROM users WHERE uname = '$uname'");
            if(mysqli_num_rows($first_result) == 1){
                die("<h1>user is already exists</h1>");
            }else{
                $query = "INSERT INTO users(fname,lname,uname,password,role,date) VALUES('$fname' ,'$lname' ,'$uname' ,'$password' ,$role ,'$cur_date')";
                $result = mysqli_query($conn,$query);
                if($result){
                    //data inserted successfully.
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