<?php

    $conpols = mysqli_connect('localhost', 'root', '', 'sait');

    if (!$conpols) {
        die('Error connect to DataBase');
    }