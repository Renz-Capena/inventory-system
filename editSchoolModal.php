<?php 
    require "db.php";

    $id = $_POST['id'];

    $q = "SELECT * FROM `schools` WHERE id='$id'";

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
    <input type="hidden" id='idEditSchool' value='<?php echo $fetch['id'] ?>'>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="inputSchoolNameEdit" value='<?php echo $fetch['school_name'] ?>' placeholder="School Name" disabled>
        <label for="floatingInput">School Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="inputPrincipalEdit" value='<?php echo $fetch['principal'] ?>' placeholder="Principal">
        <label for="floatingInput">Principal</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="inputAddressEdit" value='<?php echo $fetch['address'] ?>' placeholder="Address">
        <label for="floatingInput">Address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="inputContactEdit" value='<?php echo $fetch['contact'] ?>' placeholder="Contact Number">
        <label for="floatingInput">Contact Number</label>
    </div>
</body>
</html>