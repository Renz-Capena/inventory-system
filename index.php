<?php
    require "db.php";
    session_start();

    if(isset($_POST['loginBtn'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $q = "SELECT * FROM `users` WHERE email='$email' AND pass='$pass'";
        $list = $con->query($q);
        $info = $list->fetch_assoc();

        if($list->num_rows){
            $_SESSION['role'] = $info['role'];

            if($info['role'] == 'admin'){
                header("location: admin_dashboard.php");
            }else{
                header("location: client_dashboard.php");
            }
        }else{
            echo "<script>alert('wala')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>
<body>
    <form method='post'>
        <input type="text" name='email'>
        <input type="pass" name='pass'>
        <button name='loginBtn'>LOGIN</button>
    </form>
</body>
</html>