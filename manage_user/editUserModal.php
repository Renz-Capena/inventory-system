<?php
    require "../db.php";

    $id = $_POST['id'];

    $getUsers = "SELECT * FROM users WHERE id='$id'";
    $list = $con->query($getUsers);
    $fetchUserInfo = $list->fetch_assoc();
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

    <!-- USER ID -->
    <input type="hidden" value='<?php echo $fetchUserInfo['id'] ?>' id='updateUserIdManageUser'>
    <!--  -->

    <div class="form-floating mb-3">
        <input type="email" class="form-control" value='<?php echo $fetchUserInfo['email'] ?>' id="inputEmailEdit" placeholder="name@example.com">
        <label>Email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" value='<?php echo $fetchUserInfo['pass'] ?>' id="inputPasswordEdit" placeholder="name@example.com">
        <label>Password</label>
    </div>


    <label class='my-2'>Role</label>
    <select id='inputRoleEdit' class="form-select" aria-label="Default select example">
        <option value="<?php echo $fetchUserInfo['role'] ?>" class='bg-primary text-light'><?php echo $fetchUserInfo['role'] ?></option>
        <option value="client">Client</option>
        <option value="admin">Admin</option>
    </select>


    <label class='mt-3 mb-2'>School</label>
    <select id='inputSchoolEdit' class="form-select" aria-label="Default select example">

        <option value="<?php echo $fetchUserInfo['school'] ?>" class='bg-primary text-light'><?php echo $fetchUserInfo['school'] ?></option>

        <?php
            $getSchool = "SELECT school_name FROM schools";
            $schoolList = $con->query($getSchool);
            $schoolFetch = $schoolList->fetch_assoc();
        ?>

        <?php if($schoolList->num_rows){ ?>
            <?php do{ ?>
                <option value="<?php echo $schoolFetch['school_name'] ?>"><?php echo $schoolFetch['school_name'] ?></option>
            <?php }while($schoolFetch = $schoolList->fetch_assoc()) ?>
        <?php } ?>
        
    </select>
</body>
</html>