
<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label>Фамилия</label>
        <input type="text" name="Fam" placeholder="Введите свою фамилию">
        <label>Имя</label>
        <input type="text" name="Im" placeholder="Введите своё имя">
        <label>Отчество</label>
        <input type="text" name="Otch" placeholder="Введите своё отчество">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите адрес свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Войти</button>
        <p>
            У вас уже есть аккаунт? - <a href="/author.php">авторизируйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>



</body>
</html>



