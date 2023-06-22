<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
$us_id = $_SESSION['user']['id'];
require_once 'SaitProd/cfg/saitprodconnect.php';
?>

<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>

<header class= "header">
        <div class="container">
    <div class="header_inner">
    <div class="header_logo">
    <a href="index.php"><img src="../img/logo.png" width="100" height="100" alt=""></a>
    </div>
    <nav class="nav">
                   
                    <a class="nav_link" href="cart.php">Товары</a>
                    <?php if ($_SESSION['user']): ?>
                    <li class="user-menu">
                   <a class="nav_link" href="profile.php"><?= $_SESSION['user']['login'] ?></a>
                    <ul class="user-link">
                  
                    
                
                    <li><a class="nav_link" href="vendor/logout.php">Выйти</a></li>
                    <?php if (!empty($_SESSION['user']['status'])): ?>
                   <li> <a class="nav_link" href="../admin/adm.php">Админ панель</a> </li>
                   <?php endif; ?>
                     
                   </ul>
                    </li>
                    
                    <?php else: ?>
                   

               
                    <a class="nav_link" href="author.php">Войти</a>
                      <?php endif; ?>
                        
                     
                </nav>
    </div>
    </div>
</header>
  
    <main>
        
        <section class = "profileinfo">


            <div class="profilephoto" >
     
        <img src="../img/photo1.png" alt="">
        </div>
        
        <div class="profile-user">
              <div class="info-user"><?= $_SESSION['user']['Fam'] ?></div>
              <div class="info-user"><?= $_SESSION['user']['Im'] ?></div>
              <div class="info-user"><?= $_SESSION['user']['Otch'] ?></div>
</div>   
</section>  
<a class="nav_link" href="formchange.php">Изменить данные</a>

<table class="prdtable">
                    <thead>
                    <tr>
                        <th>Дата заказа</th>
                        <th>Статус</th>
                        <th>Общая стоимость</th>
                        <th>Количество</th>
                        <th>№ пользователя</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $pols = mysqli_query($conprod, "SELECT * FROM orders WHERE user_id = $us_id");
                    $pols = mysqli_fetch_all($pols);

                    foreach ($pols as $pol) {
                        ?>
 
                            <td><?= $pol[1] ?></td>
                            <td><?= $pol[2] ?></td>
                            <td><?= $pol[3] ?></td>
                            <td><?= $pol[4] ?></td>
                            <td><?= $pol[5] ?></td>
                   

                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
    </main>
                    
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