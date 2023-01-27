<?php
    require "../db.php";

    $schoolName = $_POST['schoolName'];
    $search = $_POST['searchValue'];
    // $search = ;

    // $q = "SELECT * FROM equipment WHERE school='$schoolName' AND code LIKE '%".$search."%' OR article LIKE '%".$search."%' OR description LIKE '%".$search."%' OR date_acquired LIKE '%".$search."%' OR unit_value LIKE '%".$search."%' OR total_value LIKE '%".$search."%' OR source_of_fund LIKE '%".$search."%'   ";

    // if($search){
    //     $x = "OR article LIKE '%".$search."%' OR description LIKE '%".$search."%'";
    //     $q = "SELECT * FROM equipment WHERE school='$schoolName' AND code LIKE '%". $search ."%' ".$x;
    // }else{
    //     $q = "SELECT * FROM equipment WHERE school='$schoolName'";
    //     // $q = "SELECT * FROM equipment";
    // }
    
    $q = "SELECT * FROM equipment WHERE school = '$schoolName' AND ( code LIKE '%$search%' OR article LIKE '%$search%' OR description LIKE '%$search%' OR date_acquired LIKE '%$search%' OR unit_value LIKE '%$search%' OR total_value LIKE '%$search%' OR source_of_fund LIKE '%$search%')";



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
    <input type="hidden" value='<?php echo $schoolName ?>' id='schoolNameForDeleteAndSearch'>
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
                <td>
                    <button type="button" class="btn btn-primary" value='<?php echo $fetch['id'] ?>' data-bs-toggle="modal" data-bs-target="#editEquipmentModal" id='editEquipmentBtn'>EDIT</button>
                    <button class="btn btn-danger" id='deleteEquipmentBtn' value='<?php echo $fetch['id'] ?>'>DELETE</button>
                </td>
            </tr>
        <?php }while($fetch = $list->fetch_assoc()) ?>
    <?php }else{ ?>
        <tr>
            <td colspan='9'>No Data</td>
        </tr>
    <?php } ?>

</body>
</html>