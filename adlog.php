<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/adminstyle.css"> -->
    <title>Вход в админ панель</title>
</head>
<body>
    <div class="adm_title">
        <h2 style="text-align: center; margin-top:100px">Авторизируйтесь в качестве администратора</h2>
    </div>
    <form action="../admin/admin.php" style="text-align: center; margin-top:50px" method="post">
        <div class="form_group">
            <input type="text"  placeholder="Введите логин" name="admlogin">
        </div>
        <div class="form_group">
        <input type="text" placeholder="Введите пароль" name="admpass">
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top:20px" >Войти</button>
    </form>
</body>
</html>