<?php
    require "db.php";

    $newPass = $_POST['newPass'];
    $id = $_POST['id'];

    $update = "UPDATE `users` SET `pass`='$newPass' WHERE id='$id'";
    $con->query($update);


    $q = "SELECT * from users where id='$id'";
    $list = $con->query($q);
    $info = $list->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profile</h1>

    <!-- user id -->
    <input type="hidden" value='<?php echo $info['id'] ?>' id='profileUserId'>
    <!--  -->
    <label>Email</label>
    <input type="text" value='<?php echo $info['email'] ?>' disabled>
    <label>Role</label>
    <input type="text" value='<?php echo $info['role'] ?>' disabled>
    <label>School</label>
    <input type="text" value='<?php echo $info['school'] ?>' disabled>
    <label>Password</label>
    <input type="text" value='<?php echo $info['pass'] ?>' disabled>
    <input type="text" id='profileNewPassword' placeholder='New password'>
    <input type="text" id='profileNewpassValidation' placeholder='Retype new password'>
    <!-- <button>BACK</button> -->
    <button id='updateUserInfoProfile'>UPDATE</button>
</body>
</html>