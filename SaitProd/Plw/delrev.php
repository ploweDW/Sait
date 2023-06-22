<?php
    require_once '../cfg/saitprodconnect.php';


    $Id=$_GET['id'];

    mysqli_query($conprod, "DELETE FROM review WHERE `review`.`id` = '$Id'");

    header('Location: ../../reviews.php');
?>