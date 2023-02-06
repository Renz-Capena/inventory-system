<?php
    require "db.php";

    $district = $_POST['district'];

    $q = "SELECT * FROM `schools` WHERE district='$district'";

    $list = $con->query($q);
    $fetch = $list->fetch_assoc();
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
                <td><?php echo $fetch['id'] ?></td>
                <td><?php echo $fetch['school_name'] ?></td>
                <td><?php echo $fetch['school_id'] ?></td>
                <td><?php echo $fetch['division'] ?></td>
                <td><?php echo $fetch['school_type'] ?></td>
                <td><?php echo $fetch['contact_person'] ?></td>
                <td><?php echo $fetch['contact_no'] ?></td>
                <td><?php echo $fetch['email'] ?></td>
                <td><?php echo $fetch['district'] ?></td>
                <td style="width: 120px">
                    <button type="button" id='editBtn' value='<?php echo $fetch['id'] ?>' class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editSchool"><i class="fa-solid fa-pen"></i></button>
                    <button class="btn btn-danger btn-sm" id='deleteBtn' value='<?php echo $fetch['id'] ?>'><i class="fa-solid fa-trash"></i></button>
                    <button class="btn btn-success btn-sm" id="viewBtn" value='<?php echo $fetch['school_name'] ?>'><i class="fa-solid fa-eye"></i></button>
                </td>
            </tr>
        <?php }while($fetch = $list->fetch_assoc()) ?>
    <?php }else{ ?>
        <tr>
            <td colspan='10'>No data</td>
        </tr>
    <?php } ?>
</body>
</html>