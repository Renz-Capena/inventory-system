<?php
    require "db.php";

    $id = $_POST['id'];

    $con->query("DELETE FROM `schools` WHERE id='$id'");
?>