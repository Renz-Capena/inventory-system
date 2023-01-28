<?php
    require "../db.php";

    $getUsers = "SELECT * FROM users";
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
    <h1>Manage User</h1>
    <button type="button" id='addUsersSchoolsModal' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserManageUser">Add User</button>

    <input type="text" id="searchUserDb" placeholder='Search user'>

    <table class='table text-center'>
        <thead>
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>ROLE</th>
                <th>SCHOOL</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody id='manageUserTbody'>
            <?php if($list->num_rows){ ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $fetchUserInfo['id'] ?></td>
                        <td><?php echo $fetchUserInfo['email'] ?></td>
                        <td><?php echo $fetchUserInfo['pass'] ?></td>
                        <td><?php echo $fetchUserInfo['role'] ?></td>
                        <td><?php echo $fetchUserInfo['school'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#EditUserManageUser" value='<?php echo $fetchUserInfo['id'] ?>' id='editUserManageUser'>EDIT</button>
                            <button class='btn btn-danger' id='deleteUserManageUser' value='<?php echo $fetchUserInfo['id'] ?>' >DELETE</button>
                        </td>
                    </tr>
                <?php }while($fetchUserInfo = $list->fetch_assoc()) ?>
            <?php }else{ ?>
                <tr>
                    <td colspan='6'>No data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>