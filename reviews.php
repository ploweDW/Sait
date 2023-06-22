<?php
session_start();
require_once 'vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Отзывы</title>
</head>

<body>
<header class="header">
<div class="container">
<div class="header_inner">
<div class="header_logo">
                    <!-- <a href="#"><img src="../img/logo.png" width="100" height="100" alt=""></a> -->
                </div>
<nav class="nav">
<!-- <a class="nav_link" href="../index.php">На главную</a>
<a class="nav_link" href="../../cart2/index.php">Товары</a> -->
</nav>
</div>
</div>
</header>
<div class= "allinone">
<div class="sidenav">
<a href="../index.php">На главную</a>
  <a href="../reviews.php">Отзывы</a>
  <a href="../polzovateli.php">Пользователи</a>
  <a href="../SaitProd/Products.php">Товары</a>
</div>

<div class="main">

<div class="rewscont mtb-3">
    <div class="rewtable-responsive">
        <table class="rewtable">
                <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Имя</th>
                    <th>Отзыв</th>
                    <th>Модерация</th>

                </tr>
                </thead>
                <tbody>
                <?php

                $revs = mysqli_query($connect, "SELECT * FROM `review`");
                $revs = mysqli_fetch_all($revs);
                foreach ($revs as $rev) {
                ?>
                <tr>
                    <!-- <td><?=$rev[0] ?></td> -->
                    <td><?=$rev[1] ?></td>
                    <td><?=$rev[2] ?></td>
                    <td><a href="../Saitprod/Plw/delrev.php?id=<?=$rev[0] ?>">Удалить</a></td>
                    
                </tr>

                
                <?php

            }

        ?>
                </tbody>
        </table>
    </div>
</div>
</div>
</div>  
</div>

</body>
</html>