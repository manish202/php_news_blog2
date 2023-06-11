<?php
    require_once("actions/config.php");
    if(isset($_SESSION['full_name']) && isset($_SESSION["uname"]) && isset($_SESSION["role"])){
        header("Location: dashboard.php");
    }
    $msg = "";
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $uname = $_POST['username'];
        $pass = md5($_POST['password']);
        $query = "SELECT * FROM users WHERE uname = '$uname' && password = '$pass'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
            //data is matched so login now
            $data = mysqli_fetch_assoc($result);
            $_SESSION['sr_no'] = $data['sr_no'];
            $_SESSION["full_name"] = $data['fname']." ".$data['lname'];
            $_SESSION["uname"] = $data['uname'];
            $_SESSION["role"] = $data['role'];
            header("Location: dashboard.php");
        }else{
            //username or password is wrong
            $msg = "username or password is wrong";
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
    <div class="login-box">
        <div class="logo">
            <a href="index.php">news blog</a><b></b>
        </div>
        <h1>login form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>username</label>
            <input class="input" name="username" type="text" required><br><br>
            <label>password</label>
            <input class="input" name="password" type="password" required><br><br>
            <input type="submit" value="login" class="login">
        </form>
        <h1><?php echo $msg; ?></h1>
    </div>
</body>
</html>