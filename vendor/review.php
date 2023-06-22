<?php
    require_once '../vendor/connect.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])){


    $reviewname=$_POST['reviewname'];
    $review=$_POST['reviewtext'];

    $check_rev = mysqli_query($connect, "INSERT INTO `review` (`id`, `reviewname`, `review`) VALUES (NULL, '$reviewname', '$review')");
    
}
header('Location: ../index.php');