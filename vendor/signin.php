<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];


    $check_user = mysqli_query($connect, "SELECT * FROM `Polzovateli` WHERE `login` = '$login'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
    
        if (password_verify($password, $user['Pass'])) {
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "E-mail" => $user['email'],
                "Fam" => $user['Fam'],
                "Im" => $user['Im'],
                "Otch" => $user['Otch'],
                "status" => $user['status']
            ];
    
            header('Location: ../profile.php');
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль';
            header('Location: ../author.php');
        }
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: ../author.php');
    }
?>
<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
