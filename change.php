<?php
    require_once 'vendor/connect.php';

   
    $Id = $_POST['id'];
    $pol = mysqli_query($connect,"SELECT * FROM `Polzovateli` WHERE `id` = '$Id'");
    $pol = mysqli_fetch_assoc($pol);

 
  
    $Im = $_POST['Im'];
    $Fam = $_POST['Fam'];
    $Otch = $_POST['Otch'];
    $Email = $_POST['E-mail'];
    $Pass = $_POST['Pass'];
    $passh = password_hash($Pass, PASSWORD_DEFAULT);
    mysqli_query($connect,"UPDATE `Polzovateli` SET `Im` = '$Im', `Fam` = '$Fam', `Otch` = '$Otch', `E-mail` = '$Email', `Pass` = '$passh' WHERE `Polzovateli`.`id` = '$Id'");

    header('Location: ../Profile.php');
?>