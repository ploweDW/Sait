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
    <title>Отзывы</title>
</head>
<body>
<div class="allinone">
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
                        <th>Дата заказа</th>
                        <th>Статус</th>
                        <th>Общая стоимость</th>
                        <th>Количество</th>
                        <th>№ пользователя</th>
                        <th>Модерация</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $pols = mysqli_query($conprod, "SELECT * FROM orders");
                    $pols = mysqli_fetch_all($pols);

                    foreach ($pols as $pol) {
                        ?>
 
                            <td><?= $pol[1] ?></td>
                            <td><?= $pol[2] ?></td>
                            <td><?= $pol[3] ?></td>
                            <td><?= $pol[4] ?></td>
                            <td><?= $pol[5] ?></td>
                            <td><a href="admin/updstatusadm.php?id=<?= $pol[0] ?>">Изменить</a></td>
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
</body>
</html>