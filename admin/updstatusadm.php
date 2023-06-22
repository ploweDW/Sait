<?php
    require_once '../SaitProd/cfg/saitprodconnect.php';
    $pol_id = $_GET['id'];
    $pol = mysqli_query($conprod,"SELECT * FROM `orders` WHERE `id` = '$pol_id'");
    $pol = mysqli_fetch_assoc($pol);
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
<form action="updst.php" method="post">
    <p class="form_title">Обновление статуса пользователя</p>

    <div class="form_group">
    <input type="hidden" readonly name="id" value="<?= $pol['id'] ?>">
    </div>
        <select  name="status" >
        <option value="В обработке" <?php if ($pol['order_status']=="В обработке") echo "selected"; ?>>В обработке</option>
        <option value="Доставляется" <?php if ($pol['order_status']=="Доставляется") echo "selected"; ?>>Доставляется</option>
        
        </select>
        <label class="form_label">Статус</label>
    </div>
    <button type="submit" class="btn_primary" name="add">Применить</button>
</form>
</div>
</body>
</html>