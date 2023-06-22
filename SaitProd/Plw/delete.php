<?php
    require_once '../cfg/saitprodconnect.php';


    $Id=$_GET['id'];

    mysqli_query($conprod, "DELETE FROM Products WHERE `Products`.`id` = '$Id'");

    header('Location: ../Products.php');
?>