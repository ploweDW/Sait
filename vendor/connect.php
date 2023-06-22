<?php

    $connect = mysqli_connect('localhost', 'root', '', 'Sait');

    if (!$connect) {
        die('Error connect to DataBase');
    }