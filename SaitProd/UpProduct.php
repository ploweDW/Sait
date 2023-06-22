<?php
    require_once 'cfg/saitprodconnect.php';

    $product_id = $_GET['id'];
    $product = mysqli_query($conprod,"SELECT * FROM `Products` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($product);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/prodstyle.css">
    <title>Изменение</title>
</head>
<body>
<div class= "form_block">
<form action="../Saitprod/Plw/update.php" method="post">
    <p class="form_title">Обновление</p>
    <div class="form_group">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    </div>
    <div class="form_group">
    <input type="text" name="Nazv" value="<?= $product['Nazv'] ?>">
    <label class="form_label">Название продукта</label>
    </div>
    <div class="form_group">
    <input type="number" name="Cena" value="<?= $product['Cena'] ?>">
    <label class="form_label">Цена продукта</label>
    </div>
    <div class="form_group">
    <textarea name="Opis" ><?= $product['Opis'] ?> </textarea> <br> <br>
    <label class="form_label">Описание продукта</label>
    </div> 
    <button type="submit" class="btn_primary" name="add">Применить</button>
</form>
</div>
</body>
</html>