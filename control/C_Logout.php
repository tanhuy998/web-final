<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    $_SESSION['user']->Out();

    $back = $_SERVER['HTTP_REFERER'];

    header("Location: $back");
    exit;
?>