<?php
    require "db.php";

    $schoolName = $_POST['schoolName'];
    $schoolID = $_POST['schoolID'];
    $contactPerson = $_POST['contactPerson'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];
    $division = $_POST['division'];
    $schoolType = $_POST['schoolType'];
    $district = $_POST['district'];

    // echo $schoolName, $principal,$address,$contact;

    $q = "INSERT INTO `schools`(`school_name`, `school_id`, `division`, `school_type`, `contact_person`, `contact_no`, `email`, `district`) VALUES ('$schoolName','$schoolID','$division','$schoolType','$contactPerson','$contactNo','$email','$district')";

    $con->query($q);
?>