<?php
    /*
    Copyright (c) 2021 David Medel (davidmedel.es)
    */

    session_start();

    include_once '../../config.php';

    if(!isset($_SESSION['donando'])){
        header("../../");
        exit;
    }

    $uid = $_SESSION['uid'];
    $cantidad = $_SESSION['cantidad'];

    $update = $con->query("UPDATE players SET donatorlvl = '1' WHERE playerid = '$uid'");

    header("Location: ../../?donado");

    unset($_SESSION['donando']);
    unset($_SESSION['uid']);
    unset($_SESSION['cantidad']);
?>