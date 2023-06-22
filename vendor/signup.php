<?php

    session_start();
    require_once 'connect.php';

    $Fam = $_POST['Fam'];
    $Im = $_POST['Im'];
    $Otch = $_POST['Otch'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

      

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($connect, "INSERT INTO `Polzovateli` (`id`, `Fam`, `Im`, `Otch`, `E-mail`, `Pass`,`login`) VALUES (NULL, '$Fam', '$Im', '$Otch', '$email', '$password','$login')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../author.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>










