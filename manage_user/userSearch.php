<?php
    require "../db.php";

    $search = $_POST['searchValue'];

    $q = "SELECT * FROM users WHERE id LIKE '%".$search."%' OR email LIKE '%".$search."%' OR pass LIKE '%".$search."%' OR role LIKE '%".$search."%' OR school LIKE '%".$search."%'";

    $list = $con->query($q);
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