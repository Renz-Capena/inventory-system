<?php
    require "db.php";

    $id = $_POST['id'];

    $q = "DELETE FROM `equipment` WHERE id='$id'";

    $con->query($q);

    $getRequest = "SELECT * FROM `equipment` WHERE permission='Deny'";
    $listRequest = $con->query($getRequest);
    $requestCount = $listRequest->num_rows;


    if($requestCount){
        echo $requestCount;
    }
?>