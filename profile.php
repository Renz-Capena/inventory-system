<?php
    require "db.php";

    $id = $_POST['id'];

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
    <style>
        /* .profile-img{
            text-align: center;
        } */
        /* .profile-img img{
            width: 20px;
            height: auto;
        } */
        /* .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 80%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-img input{
            cursor: pointer;
        } */
        /* .wrapper{
            background-size: cover;
            background-repeat: no-repeat;
        } */
        /* .profile-img::before{
            content: '';
            width: 400px;
            height: 300px;
            background-color: #f5f5f5;
            position: absolute;
            top: 0;
            left: 0;
        } */
    </style>
</head>
<body style="background: url(https://cdn.pixabay.com/photo/2017/07/01/19/48/background-2462431_960_720.jpg) no-repeat; background-size: cover; background-color: #e5e5e5; background-blend-mode: overlay;">
    <h2 class="text-secondary fw-bold">My Profile</h2>

    <!-- user id -->
    <!-- <input type="hidden" value='<?php echo $info['id'] ?>' id='profileUserId'> -->
    <!--  -->
    <!-- <label>Email</label>
    <input type="text" value='<?php echo $info['email'] ?>' disabled>
    <label>Role</label>
    <input type="text" value='<?php echo $info['role'] ?>' disabled>
    <label>School</label>
    <input type="text" value='<?php echo $info['school'] ?>' disabled>
    <label>Password</label>
    <input type="text" value='<?php echo $info['pass'] ?>' disabled>
    <input type="text" id='profileNewPassword' placeholder='New password'>
    <input type="text" id='profileNewpassValidation' placeholder='Retype new password'> -->
    <!-- <button>BACK</button> -->
    <!-- <button id='updateUserInfoProfile'>UPDATE</button> -->


    <div class="wrapper d-flex align-items-center flex-column justify-content-center gap-3 px-3 mt-4 position-relative" style=" padding-block: 20px; background-color: #e2f8fb">
        <!-- <div class="col-md-4"> -->
            <div class="profile-img">
            <span class=" px-5 pb-1"><i class="fa-solid fa-user fs-1"></i></span>
            <hr>
                <!-- <div class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" name="file"/>
                </div> -->
            </div>
        <!-- </div> -->
        <!-- <div class="divider"></div> -->
        <div class="card mb-3 w-50">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3"><h6 class="mb-0">Email</h6></div>
                    <div class="col-sm-9 text-secondary"><?php echo $info['email'] ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3"><h6 class="mb-0">Role</h6></div>
                    <div class="col-sm-9 text-secondary"><?php echo $info['role'] ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3"><h6 class="mb-0">School</h6></div>
                    <div class="col-sm-9 text-secondary"><?php echo $info['school'] ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3"><h6 class="mb-0">Password</h6></div>
                    <div class="col-sm-9 text-secondary"><?php echo $info['pass'] ?></div>
                </div>
                <hr>
                <!-- <div class="row">
                    <div class="col-sm-3"><h6 class="mb-0">Address</h6></div>
                    <div class="col-sm-9 text-secondary">Bay Area, San Francisco, CA</div>
                </div>
                <hr> -->
                <div class="row">
                    <div class="col-sm-12"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#EditUserProfile" id='editProfileBtnDb' value='<?php echo $info['id'] ?>'>Edit</button></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>