<?php
    require "../db.php";

    $school = $_POST['schoolName'];
        
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
    <h1><?php echo strtoupper($school) ?></h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">Add Equipment</button>
    <table class='table text-center'>
        <thead>
            <tr>
                <th>item No.</th>
                <th>Code</th>
                <th>Article</th>
                <th>Description</th>
                <th>Date Acquired</th>
                <th>Unit Value</th>
                <th>Total Value</th>
                <th>Source of Funds</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody id='equipmentTableTbody'>
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
                        <td>
                            <button>EDIT</button>
                            <button>DELETE</button>
                        </td>
                    </tr>
                <?php }while($fetch = $list->fetch_assoc()) ?>
            <?php }else{ ?>
                <tr>
                    <td colspan='8'>No Data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>