<?php
    require_once '../SaitProd/cfg/saitprodconnect.php';



    $Id = $_POST['id'];
    $Im = $_POST['Im'];
    $Fam = $_POST['Fam'];
    $Otch = $_POST['Otch'];
    $Email = $_POST['E-mail'];
    $status = $_POST['status'];

    mysqli_query($conprod,"UPDATE `Polzovateli` SET `Im` = '$Im', `Fam` = '$Fam', `Otch` = '$Otch', `E-mail` = '$Email', `status` = '$status' WHERE `Polzovateli`.`id` = '$Id'");

    header('Location: ../polzovateli.php');
?>