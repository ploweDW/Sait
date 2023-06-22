<?php

    $conprod = mysqli_connect('localhost', 'root', '', 'sait');

    if (!$conprod) {
        die('Error connect to DataBase');
    }