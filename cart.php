<?php
// Начало сессии пользователя
session_start();
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sait";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}
// Получение списка товаров
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<header class = "header">
<div class="container">
<div class="header_inner">

<div class="header_logo">
    <a href="index.php"><img src="../img/logo.png" width="100" height="100" alt=""></a>
</div>
<nav class="nav">

<a class="nav_link" href="cart2.php">Корзина</a>

</nav>
</div>

</div>
</header>
    <title>Моя корзина товаров</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap');
        @import url("https://use.fontawesome.com/releases/v5.15.1/css/all.css");
        @import url("https://use.fontawesome.com/releases/v5.15.1/css/v4-shims.css");

        .rewscont{
            max-width: 1200px;
            margin: center;
            padding: 0 175px;
            padding-left: 200px;
            font-family: 'Comfortaa', serif;
        }

        .mtb-3{
            margin-top: 3rem;
            margin-bottom: 3rem;
            margin: auto;
        }

        .rewtable{
            width: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-collapse: collapse;
            white-space: nowrap;
        }

        .container{
            max-width: 1170px;
            margin: 0 auto;
            padding: 0 10px;
        }

        .header{
            width: 100%;
            height: 100px;
        }

        .header_inner{
            display: flex;
            justify-content: space-between;
            padding: -50px 0px;
            align-items: center;
        }

        .nav
        {
                display: flex;
            flex-wrap: wrap;
            font-family: 'Comfortaa', serif;
            font-size: 16px;
            font-weight: 700;
        
            line-height: 171%;
        }

        .nav_link{
            margin-left: 500px;
            color: rgb(2, 25, 24);
            text-decoration: none;
        }

        body {
            background-color: #fff;
            color: #444444;
            font-family: 'Comfortaa', serif;
        }

        table {
            width: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            border-collapse: collapse;
            white-space: nowrap;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #7B52AB;
            color: #201e20;
        }

        tr:nth-child(even) {
            background: #c28eff;
        }

        th:nth-child(odd) {
            background: #c28eff;
        }

        tr:nth-child(even) {
            background: #d3acff62;
        }

        tr{
            transition: all .3s;
        }

        td:not(:last-child){
            border-right: 1px solid #d0a8ff;
        }

        tr:hover {
            background-color: #d3acff;
        }

        form {
            display: inline-block;
        }

        input[type="number"] {
            width: 50px;
        }

        input[type="submit"] {
            background-color: #B63EFF;
            color: #000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-family: 'Comfortaa', serif;
        }

        h2 {
            color: #B63EFF;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .total {
            font-weight: bold;
        }
        footer {
            background-color: #f2f2f2;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 1890px;
            height: 50px;
        }
        
        .social-links a {
            color: #333;
            font-size: 20px;
            margin-right: 10px;
        }
        
        .contact-info a {
            color: #333;
            font-size: 16px;
           
        } 
        
        .fab {
            font-size: inherit;
        } 

    </style>
</head>
<body>
    <div class="rewscont mtb-3">
    <div class="rewtable-responsive">
        <table class="rewtable">
        <h2>Список товаров</h2>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Nazv'] . "</td>";
            echo "<td>" . $row['Cena'] . "</td>";
            echo "<td>
                    <form method='post' action='cart2.php'>
                        <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                        <input type='number' name='quantity' value='1' min='1'>
                        <input type='hidden' name='price' value='" . $row['Cena'] . "'>
                        <input type='submit' name='add_to_cart' value='Добавить в корзину'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
    </div>   
</body>

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
</html>