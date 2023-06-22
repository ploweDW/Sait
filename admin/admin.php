<?php
    require_once '../vendor/connect.php';



    $admlogin=$_POST['admlogin'];
    $admpass=$_POST['admpass'];

    $check_adm = mysqli_query($connect, "SELECT * FROM admin WHERE admlog = '$admlogin' AND admpass = '$admpass'");
    if (mysqli_num_rows($check_adm) > 0) {

        header('Location: ../SaitProd/Products.php');
    } else {
       
    }
?>