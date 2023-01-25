<?php
    require "db.php";

    $q = "SELECT * FROM `schools`";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSchool">
  add school
    </button>
    <input type="text" id='searchBar' placeholder='search'>
    <table class='table text-center'>
        <thead>
            <tr>
                <th>id</th>
                <th>school name</th>
                <th>address</th>
                <th>principal</th>
                <th>contact num</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody id="idForSearchOutput">
            <?php if($list->num_rows){ ?>
                <?php do{ ?>
                    <tr>
                        <td><?php echo $fetch['id'] ?></td>
                        <td><?php echo $fetch['school_name'] ?></td>
                        <td><?php echo $fetch['address'] ?></td>
                        <td><?php echo $fetch['principal'] ?></td>
                        <td><?php echo $fetch['contact'] ?></td>
                        <td>
                            <button>EDIT</button>
                            <button>DELETE</button>
                        </td>
                    </tr>
                <?php }while($fetch = $list->fetch_assoc()) ?>
            <?php }else{ ?>
                <tr>
                    <td colspan='6'>No data</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    


</body>
</html>