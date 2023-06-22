<?php
    require_once '../cfg/saitprodconnect.php';


    $Id = $_POST['id'];
    $Nazv = $_POST['Nazv'];
    $Cena = $_POST['Cena'];
    $Opis = $_POST['Opis'];

    mysqli_query($conprod,"UPDATE `Products` SET `Nazv` = '$Nazv', `Cena` = '$Cena', `Opis` = '$Opis ' WHERE `Products`.`id` = '$Id'");

    header('Location: ../Products.php');
?>