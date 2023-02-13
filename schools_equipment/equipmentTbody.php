<?php
    require "../db.php";
    session_start();

    $school = $_POST['schoolName'];

    // echo $school;
        
    $q = "SELECT * FROM `equipment` WHERE school='$school'";

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
    
    <!-- FOR DELETE AND SEARCH EQUIPMENT -->
    <input type="hidden" value='<?php echo $school ?>' id='schoolNameForDeleteAndSearch'>
    <!--  -->
    
    <?php if($list->num_rows){ ?>
        <?php do{ ?>
            <tr>
                <td><?php echo $fetch['id'] ?></td>
                <td><?php echo $fetch['code'] ?></td>
                <td><?php echo $fetch['article'] ?></td>
                <td><?php echo $fetch['description'] ?></td>
                <td><?php echo $fetch['date_acquired'] ?></td>
                <td><?php echo $fetch['unit_value'] ?></td>
                <td><?php echo $fetch['total_value'] ?></td>
                <td><?php echo $fetch['source_of_fund'] ?></td>
                <td><?php echo $fetch['status'] ?></td>
                <td class="d-flex gap-1">
                    <button type="button" class="btn btn-primary btn-sm" value='<?php echo $fetch['id'] ?>' data-bs-toggle="modal" data-bs-target="#editEquipmentModal" id='editEquipmentBtn'><i class="fa-solid fa-pen"></i></button>

                    <?php if($_SESSION['status'] == 'Admin'){ ?>
                        <button class="btn btn-danger btn-sm" id='deleteEquipmentBtn' value='<?php echo $fetch['id'] ?>'><i class="fa-solid fa-trash"></i></button>
                    <?php } ?>
                </td>
            </tr>
        <?php }while($fetch = $list->fetch_assoc()) ?>
    <?php }else{ ?>
        <tr>
            <td colspan='10'>No Data</td>
        </tr>
    <?php } ?>
</body>
</html>