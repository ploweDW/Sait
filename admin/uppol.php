<?php
    require_once '../SaitProd/cfg/saitprodconnect.php';

    $pol_id = $_GET['id'];
    $pol = mysqli_query($conprod,"SELECT * FROM `Polzovateli` WHERE `id` = '$pol_id'");
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
<form action="../admin/updatepol.php" method="post">
    <p class="form_title">Обновление статуса пользователя</p>
    <div class="form_group">
    <input type="hidden" readonly name="id" value="<?= $pol['id'] ?>">
    </div>
    <div class="form_group">
    <input type="text" readonly name="Im"  value="<?= $pol['Im'] ?>">
    <label class="form_label">Имя</label>
    </div>
    <div class="form_group">
    <input type="text" readonly name="Fam"  value="<?= $pol['Fam'] ?>">
    <label class="form_label">Фамилия</label>
    </div>
    <div class="form_group">
    <input type="text" readonly name="Otch"  value="<?= $pol['Otch'] ?>">
    <label class="form_label">Отчетсво</label>
    </div>
    <div class="form_group">
    <input type="text" readonly name="E-mail" value="<?= $pol['E-mail'] ?>">
    <label class="form_label">Почта</label>
    </div>
    <div class="form_group">

        <select  name="status" >
        <option value="0" <?php if ($pol['status']==0) echo "selected"; ?>>0</option>
        <option value="1" <?php if ($pol['status']==1) echo "selected"; ?>>1</option>
        
        </select>
        <label class="form_label">Статус</label>
    </div>
    <button type="submit" class="btn_primary" name="add">Применить</button>
</form>
</div>
</body>
</html>