<?php
    require "../db.php";

    $schoolName = $_POST['schoolName'];

    $code = $_POST['code'];
    $article = $_POST['article'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $unitValue = $_POST['unitValue'];
    $totalValue = $_POST['totalValue'];
    $sourceOfFunds = $_POST['sourceOfFunds'];

    $q = "INSERT INTO `equipment`(`code`, `article`, `description`, `date_acquired`, `unit_value`, `total_value`, `source_of_fund`, `school`) VALUES ('$code','$article','$description','$date','$unitValue','$totalValue','$sourceOfFunds','$schoolName')";

    $con->query($q);
?>