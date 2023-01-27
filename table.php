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
    <div class="d-flex align-items-center justify-content-between mb-3 mt-4 position-relative">
        <div class="d-flex align-items-center gap-4">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addSchool">Add School</button>
            <select class="form-select" aria-label="Default select example">
                <option selected>Select District</option>
                <option value="North">North</option>
                <option value="South">South</option>
                <option value="West">West</option>
                <option value="East">East</option>
            </select>
        </div>
        <div class="d-flex align-items-center gap-2">
            <input id='searchBar' class="form-control form-control-sm fs-17 py-2 ps-5" type="text" placeholder='Search Data'
            aria-label="Search">
            <div style="position: absolute; top: 10px; right: 180px; z-index: 1;">
                <i class="fas fa-search fs-5 text-secondary" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <table class='table text-center table-striped'>
        <thead>
            <tr>
                <th>Id</th>
                <th>School Name</th>
                <th>Address</th>
                <th>Principal</th>
                <th>Contact No.</th>
                <th>Action</th>
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
                            <button type="button" id='editBtn' value='<?php echo $fetch['id'] ?>' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editSchool">EDIT</button>
                            <button class="btn btn-danger" id='deleteBtn' value='<?php echo $fetch['id'] ?>'>DELETE</button>
                            <button class="btn btn-success" id="viewBtn" value='<?php echo $fetch['school_name'] ?>'>VIEW</button>
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