<?php
session_start();
require_once 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Главная страница</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">

            <header class="header">
                <div class="container">
                    <div class="header_inner">
                <div class="header_logo">
                    <a href="#"><img src="../img/logo.png" width="100" height="100" alt=""></a>
                </div>
                <nav class="nav">
                   
                    
                    <?php if ($_SESSION['user']): ?>
                        <a class="nav_link" href="cart.php">Товары</a>
                    <li class="user-menu">
                   <a class="nav_link" href="profile.php"><?= $_SESSION['user']['login'] ?></a>
                    <ul class="user-link">
                  
                    
                
                    <li><a class="nav_link" href="vendor/logout.php">Выйти</a></li>
                    <?php if (!empty($_SESSION['user']['status'])): ?>
                   <li> <a class="nav_link" href="../admin/adm.php">Админка</a> </li>
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

            <!-- <div class="intro"> -->
                <div class="intro_container container">
                    <div class="intro_inner">
                        <h1 class="main_title"></h1>
                        <p class="subtitle"></p>
                     
                </div>
            <!-- </div> -->

            <div class="cards">
                <div class="container_cards container">
                    <p></p>
                    <p></p>
                    <hr>
                    <p class="cards_title title">Товары</p>
                    <div class="cards_inner">
                        
                        <div class="card_item">
                            <div class="card_row">
                            <div class="card_img1"></div>
                                <!-- <img class="card_img" src="" alt=""> -->
                                <p class="otkritka">Стикеры</p>
                                <div class="card_text1">Крассивые тематические стикеры.</div>
                                <!-- <a class="card_btn" href="">Далее</a> -->
                            </div>
                        </div>
                        <div class="card_item">
                            <div class="card_row">
                            <div class="card_img2"></div>
                                <!-- <img class="card_img" src="../adaptive/img/1.jfif" alt=""> -->
                                <p class="priglashenie">Баннер</p>
                                <div class="card_text2">Вы можете сделать из своей любимой картинки красивейший банер. </div>
                                <!-- <a class="card_btn" href="">Далее</a> -->
                            </div>
                        </div>
                        <div class="card_item">
                            <div class="card_row">
                            <div class="card_img3"></div>
                                <!-- <img class="card_img" src="../adaptive/img/1.jfif" alt=""> -->
                                <p class="visitka">Календарь</p>
                                <div class="card_text3">
                                    Календарь по вашим предпочтениям.
                                </div>
                                <!-- <a class="card_btn" href="">Далее</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="cards_inner">
                        
                        <div class="card_item">
                            <div class="card_row">
                                <div class="card_img4"></div>
                                <!-- class="card_img4" src="../img/Maried/1.jpg" alt="" -->
                                <p class="banner">Приглашение</p>
                                <div class="card_text4">
                                Ваше приглашение на ваше прекрасное мероприятие.
                                </div>
                                <!-- <a class="card_btn" href="">Далее</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="block_information">
                <div class="block_container container">
                   
                    <div class="block_information_inner">
                        <div class="block_information_img">
                            <!-- <img class="block_img" src="../adaptive/img/backgrnd.jpg" alt=""> -->
                        </div>
                        <div class="block_information_paragraph">
                            <div class="block_information_title">
                                Информация о нас
                            </div>
                            <div class="block_information_text2">
                                Мы поможем создать цепляющие взгляд банер, визитку или же приглашение.
                                Просто выберите форму и оставьте заявку, после чего мы свяжемся с вами для уточнения ваших пожеланий.
                            </div>
                            </div>
                   
                    </div>
                </div>
            </div>

          

            <div class="advantage_block">
                <div class="advantage_container container">
                    <div class="advantage_title title">Почему мы?</div>
                    <div class="advantage_block_inner">

                        <div class="advantage_item">
                            <div class="advantage_row">
                                <div class="ds">
                                <img src="../adaptive/img/" alt="">
                            </div>
                                <div class="advantage_information">
                                    
                                    <div class="advantage_subtitle">
                                        Качество
                                    </div>
                                    <div class="advantage_text">
                                        Качество — важнейший фактор, отвечающий за количество постоянных клиентов. Мы дорожим своей репутацией.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="advantage_item">
                            <div class="advantage_row">
                                <div class="ds">
                                <img src="../adaptive/img/" alt="">
                            </div>
                                <div class="advantage_information">
                                    <div class="advantage_subtitle">
                                        Широкий ассортимент
                                    </div>
                                    <div class="advantage_text">
                                        Большой выбор рекламной продукции. Наш ассортимент постоянно расширяется.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="advantage_item">
                            <div class="advantage_row">
                                <div class="ds">
                                <img src="../adaptive/img/" alt="">
                            </div>
                                <div class="advantage_information">
                                    <div class="advantage_subtitle">
                                        Высока скорость обработки заказов
                                    </div>
                                    <div class="advantage_text">
                                        Мы прекрасно знаем, как важно быстро получить уверенность в готовности своего заказа и узнать, когда он будет доставлен.
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="rewscont mtb-3">
    <div class="rewtable-responsive">
        <table class="rewtable">
                <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Имя</th>
                    <th>Отзыв</th>

                </tr>
                </thead>
                <tbody>
                <?php

                $revs = mysqli_query($connect, "SELECT * FROM `review`");
                $revs = mysqli_fetch_all($revs);
                foreach ($revs as $rev) {
                ?>
                <tr>
                    <!-- <td><?=$rev[0] ?></td> -->
                    <td><?=$rev[1] ?></td>
                    <td><?=$rev[2] ?></td>
                    
                </tr>

                
                <?php

            }

        ?>
                </tbody>
        </table>
    </div>
</div>

            <div class="form_block">
                <form action="../vendor/review.php" class="form" method="POST" >
            
                    <p class="form_title">Оставьте свои отызвы тут!</p>
             
                    <div class="form_group">
                      <input class="form_input" name="reviewname">
                      <label class="form_label">Имя</label>
                    </div>
            
                   <div class="form_group">
                    <textarea name="reviewtext" ></textarea>
                    <label class="form_label">Отзыв</label>
                  </div>
             
                  <button type="submit" class="btn_primary" name="send">Отправить</button>
             
                  </form>
            </div>

            

        </div>
<!-- <footer class="footer">
<div class="footer_container">
    <div class="footer_inner">
        <div class="telegram">
        <a href="#"><img src="../icons/tg.png" width="40" height="40" alt=""></a>
        <a href="#"><img src="../icons/inst.png" width="40" height="40" alt=""></a>
        
        </div>
        
        </div>
        </div>
        <div class="inst">
  
        </div>
    </div>
</div>
</footer> -->
        
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

    </div>
</body>
</html>