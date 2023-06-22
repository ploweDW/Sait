<?php
    require_once 'vendor/connect.php';
    session_start();
    $pol_id = $_SESSION['user']['id'];
    $pol = mysqli_query($connect,"SELECT * FROM `Polzovateli` WHERE `id` = '$pol_id'");
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
<form action="change.php" method="post">
    <p class="form_title">Обновление данных пользователя</p>
    <div class="form_group">
    <input type="hidden" name="id" value="<?= $pol['id'] ?>">
    </div>
    <div class="form_group">
    <input type="text" name="Im"  value="<?= $pol['Im'] ?>">
    <label class="form_label">Имя</label>
    </div>
    <div class="form_group">
    <input type="text" name="Fam"  value="<?= $pol['Fam'] ?>">
    <label class="form_label">Фамилия</label>
    </div>
    <div class="form_group">
    <input type="text" name="Otch"  value="<?= $pol['Otch'] ?>">
    <label class="form_label">Отчетсво</label>
    </div>
    <div class="form_group">
    <input type="text" name="E-mail" value="<?= $pol['E-mail'] ?>">
    <label class="form_label">Почта</label>
    </div>
    <div class="form_group">
    <input type="text" name="Pass" value="">
    <label class="form_label">Пароль</label>
    </div>

    <button type="submit" class="btn_primary" name="add">Применить</button>
</form>
</div>
</body>
</html>