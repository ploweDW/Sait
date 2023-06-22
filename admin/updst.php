<?php
    require_once '../SaitProd/cfg/saitprodconnect.php';

    $Id = $_POST['id'];
    $status = $_POST['status'];

    mysqli_query($conprod,"UPDATE `orders` SET `order_status` = '$status' WHERE `orders`.`id` = '$Id'");

    header('Location: ../admin_orders.php');
?>