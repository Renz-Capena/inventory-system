<?php
    require "db.php";

    $id = $_POST['id'];
    $schoolNameEdit = $_POST['schoolNameEdit'];
    $principalEdit = $_POST['principalEdit'];
    $addressEdit = $_POST['addressEdit'];
    $contactEdit = $_POST['contactEdit'];

    // echo $id,$schoolNameEdit, $principalEdit,$addressEdit,$contactEdit;

    $q = "UPDATE `schools` SET `school_name`='$schoolNameEdit',`address`='$addressEdit',`principal`='$principalEdit',`contact`='$contactEdit' WHERE id='$id'";

    $con->query($q);
?>