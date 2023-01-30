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
        <input type="text" value='<?php echo $fetch['school_name'] ?>' class="form-control" id="inputSchoolName" placeholder="School Name">
        <label for="floatingInput">School Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" value='<?php echo $fetch['school_id'] ?>' class="form-control" id="inputSchoolID" placeholder="School ID">
        <label for="floatingInput">School ID</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" value='<?php echo $fetch['contact_person'] ?>' class="form-control" id="inputContactPerson" placeholder="Contact Person">
        <label for="floatingInput">Contact Person</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" value='<?php echo $fetch['contact_no'] ?>' class="form-control" id="inputContactNo" placeholder="Contact No">
        <label for="floatingInput">Contact No</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" value='<?php echo $fetch['email'] ?>' class="form-control" id="inputEmail" placeholder="Email">
        <label for="floatingInput">Email</label>
    </div>
    <label class='mt-2 mb-2 ps-2'>Division</label>
    <select class="form-select" aria-label="Default select example" id='inputDivision'>
        <option class='bg-primary' value="<?php echo $fetch['division'] ?>"><?php echo $fetch['division'] ?></option>
        <option value="DCS-Valenzuela">DCS-Valenzuela</option>
    </select>
    <label class='mt-3 mb-2 ps-2'>School Type</label>
    <select class="form-select" aria-label="Default select example" id='inputSchoolType'>
        <option class='bg-primary' value="<?php echo $fetch['school_type'] ?>"><?php echo $fetch['school_type'] ?></option>
        <option value="Public">Public</option>
        <option value="Private">Private</option>
    </select>
    <label class='mt-3 mb-2 ps-2'>District</label>
    <select class="form-select" aria-label="Default select example" id='inputDistrict'>
        <option class='bg-primary' value="<?php echo $fetch['district'] ?>"><?php echo $fetch['district'] ?></option>
        <option value="Congressional I">Congressional I</option>
        <option value="Congressional II">Congressional II</option>
        <option value="South">South</option>
        <option value="North">North</option>
        <option value="East">East</option>
        <option value="Central">Central</option>
    </select>
</body>
</html>