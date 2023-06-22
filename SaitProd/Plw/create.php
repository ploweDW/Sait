<?php
    require_once '../cfg/saitprodconnect.php';



    $Nazv = $_POST['Nazv'];
    $Cena = $_POST['Cena'];
    $Opis = $_POST['Opis'];

    mysqli_query($conprod,"INSERT INTO `Products` (`id`, `Nazv`, `Cena`, `Opis`) VALUES (NULL, '$Nazv', '$Cena', '$Opis')");



    header('Location: ../Products.php');
?>