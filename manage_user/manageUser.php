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
    <div class=" text-secondary fw-bold p-2 ps-0 mb-3 w-25 h3">Manage Users</div>

    <div class="d-flex align-items-center justify-content-between mb-3 mt-4 position-relative">
        <button type="button" id='addUsersSchoolsModal' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserManageUser">Add User</button>


        <div class="d-flex align-items-center gap-2">
            <input id='searchUserDb' class="form-control form-control-sm fs-17 py-2 ps-5" type="text" placeholder='Search User'
            aria-label="Search">
            <div style="position: absolute; top: 10px; right: 180px; z-index: 1;">
                <i class="fas fa-search fs-5 text-secondary" aria-hidden="true"></i>
            </div>
        </div>

    </div>

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