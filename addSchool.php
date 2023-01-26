<?php
    require "db.php";

    $schoolName = $_POST['schoolName'];
    $principal = $_POST['principal'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    echo $schoolName, $principal,$address,$contact;

    $q = "INSERT INTO `schools`(`school_name`, `address`, `principal`, `contact`) VALUES ('$schoolName','$address','$principal','$contact')";

    $con->query($q);
?>