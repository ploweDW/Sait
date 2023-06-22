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

// Обработка добавления товара в корзину
if (isset($_POST['add_to_cart']) && $_SERVER["REQUEST_METHOD"]==="POST") {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    // Проверка наличия товара в корзине для текущего пользователя
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Обновление количества товара в корзине
        $row = $result->fetch_assoc();
        $cart_id = $row['id'];
        $new_quantity = $row['quantity'] + $quantity;

        $sql = "UPDATE cart SET quantity = $new_quantity WHERE id = $cart_id";
        $conn->query($sql);
    } else {
        // Добавление нового товара в корзину
        $sql = "INSERT INTO cart (user_id, product_id, quantity, price) VALUES ($user_id, $product_id, $quantity, $price)";
        $conn->query($sql);
    }
    header("Location: cart.php");
}


// Обработка оформления заказа
if (isset($_POST['place_order']) && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Получение информации о товарах в корзине для текущего пользователя
    $user_id = $_SESSION['user']['id'];
    $total_count = $_POST['total_count'];
    $total_price = $_POST['total_amount'];
    $sql = "SELECT cart.quantity, cart.product_id, cart.price, Products.id  FROM cart JOIN Products ON cart.product_id = Products.id WHERE cart.user_id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Создание нового заказа
        $order_date = date('Y-m-d H:i:s');
        $total_amount = 0;
        $order_status = "В обработке";

        $sql = "INSERT INTO orders (user_id, order_date, order_status, total_count, total_price) VALUES ($user_id, '$order_date', '$order_status', '$total_count', '$total_price')";
        $conn->query($sql);

        $order_id = $conn->insert_id; // Получение ID только что созданного заказа

        // Добавление товаров из корзины в таблицу Order_Items
        while ($row = $result->fetch_assoc()) {
            $product_id = $row['id'];
            $quantity = $row['quantity'];
            $price = $row['price'];
 
            $sql = "INSERT INTO orders_items (user_id, order_id, product_id, count, price) VALUES ($user_id, $order_id, $product_id, $quantity, $price)";
            $conn->query($sql);
        }

        // Обновление общей суммы заказа в таблице Orders
        $sql = "UPDATE orders SET total_amount = $total_amount WHERE order_id = $order_id";
        $conn->query($sql);

        // Очистка корзины пользователя
        $sql = "DELETE FROM cart WHERE user_id = $user_id";
        $conn->query($sql);

        header("Location: cart2.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>

    <header class = "header">
<div class="container">
<div class="header_inner">

<div class="header_logo">
    <a href="index.php"><img src="../img/logo.png" width="100" height="100" alt=""></a>
</div>
<nav class="nav">

<a class="nav_link" href="profile.php"><?= $_SESSION['user']['login'] ?></a>
</nav>
</div>

</div>
</header>
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

        .main{
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

            margin-top: 30px;
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

        .total {
            font-weight: bold;
        }

    </style>
</head>
<body>
<div class="main">
<h2> Ваша корзина</h2>
    <?php
    // Получение информации о товарах в корзине для текущего пользователя
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT cart.quantity, Products.Nazv, Products.Cena FROM cart JOIN products ON cart.product_id = Products.id WHERE cart.user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    
                </tr>";
                $total_qt = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Nazv'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['Cena'] * $row['quantity'] . "</td>";
            $subtotal = $row['quantity'] * $row['Cena'];
            $total_amount += $subtotal;
            $total_qt +=  $row['quantity'];
           
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='1'><strong>Итого:</strong></td>";
        echo "<td>" . $total_qt . "</td>";
        echo "<td>" . $total_amount . "</td>";
        
        echo "</tr>";
      
        echo "</table>";
    } else {
        echo "Ваша корзина пуста.";
        echo "<br>";
    }
    echo "<form method='post' action='cart2.php'>
    <input type='hidden' name='total_count' value = '" . $total_qt . "'>
    <input type='hidden' name='total_amount' value = '" . $total_amount . "'>
    <input type='submit' name='place_order' value='Оформить заказ'>
</form>";
    // Закрытие соединения с базой данных
    $conn->close();
    ?>

</div>

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