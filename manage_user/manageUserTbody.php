<?php
    require "../db.php";

    $getUsers = "SELECT * FROM users";
    $list = $con->query($getUsers);
    $fetcUserInfo = $list->fetch_assoc();
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
    <?php if($list->num_rows){ ?>
        <?php do{ ?>
            <tr>
                <td><?php echo $fetcUserInfo['id'] ?></td>
                <td><?php echo $fetcUserInfo['email'] ?></td>
                <td><?php echo $fetcUserInfo['pass'] ?></td>
                <td><?php echo $fetcUserInfo['role'] ?></td>
                <td><?php echo $fetcUserInfo['school'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditUserManageUser" value='<?php echo $fetcUserInfo['id'] ?>' id='editUserManageUser'>EDIT</button>          
                    <button class='btn btn-danger' id='deleteUserManageUser' value='<?php echo $fetcUserInfo['id'] ?>' >DELETE</button>
                </td>
            </tr>
        <?php }while($fetcUserInfo = $list->fetch_assoc()) ?>
    <?php }else{ ?>
        <tr>
            <td colspan='6'>No data</td>
        </tr>
    <?php } ?>
</body>
</html>