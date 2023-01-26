<?php
    require "db.php";

    $searchValue = $_POST['searchValue'];

    $q = "SELECT * FROM schools WHERE id LIKE '%".$searchValue."%' OR school_name LIKE '%".$searchValue."%' OR address like '%".$searchValue."%' OR principal LIKE '%".$searchValue."%' OR contact LIKE '%".$searchValue."%'";

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
            <td><?php echo $fetch['address'] ?></td>
            <td><?php echo $fetch['principal'] ?></td>
            <td><?php echo $fetch['contact'] ?></td>
            <td>
                <button type="button" id='editBtn' value='<?php echo $fetch['id'] ?>' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSchool">EDIT</button>
                <button id='deleteBtn' value='<?php echo $fetch['id'] ?>'>DELETE</button>
                <button id="viewBtn" value='<?php echo $fetch['school_name'] ?>'>VIEW</button>
            </td>
        </tr>
    <?php }while($fetch = $list->fetch_assoc()) ?>
<?php }else{ ?>
    <tr>
        <td colspan='6'>No data</td>
    </tr>
<?php } ?>
</body>
</html>