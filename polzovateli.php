<?php
session_start();
require_once 'SaitProd/cfg/saitprodconnect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/prodstyle.css">
    <title>Админ панель</title>
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
<div class="prdscont mtb-3">
    <div class="prdtable-responsive">
        <table class="prdtable">
            <thead>
                <tr>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчетсво</th>
                    <th>Почта</th>
                    <th>Логин</th>
                    <th>Статус</th>
                    <th>Модерация</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $pols = mysqli_query($conprod, "SELECT * FROM `Polzovateli`");
            $pols = mysqli_fetch_all($pols);
            foreach ($pols as $pol) {
            ?>
            <tr>
                <td><?=$pol[1] ?></td>
                <td><?=$pol[2] ?></td>
                <td><?=$pol[3] ?></td>
                <td><?=$pol[4] ?></td>
                <td><?=$pol[6] ?></td>
                <td><?=$pol[7] ?></td>
                <td><a href="admin/uppol.php?id=<?=$pol[0] ?>">Изменить</a></td>
            </tr>


            <?php

        }

    ?>

            </tbody>
        </table>

    </div>
</div>

<!-- <div class= "form_block">

    <form action="../Saitprod/Plw/create.php" method="post">
    <p class="form_title">Добавление</p>
    <div class="form_group">
    <input type="text" name="Nazv">
    <label class="form_label">Название продукта</label>
    </div>
    <div class="form_group">
    <input type="number" name="Cena">
    <label class="form_label">Цена продукта</label>
    </div>
    <div class="form_group">
    <textarea name="Opis"></textarea>
    <label class="form_label">Описание продукта</label>
    </div> 
    <br> <br>
    <button type="submit" class="btn_primary" name="add">Добавить</button>
    </form>


</div> -->
</div>  
</div>
<footer>
  <div class="social-links">
    <a href="#"><i class="fab fa-facebook"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
  </div>
  <div class="contact-info">
    <a href="mailto:WVik@example.com">WVik@example.com</a>
  </div>
</footer>
</body>
</html>