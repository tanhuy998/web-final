<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    if (isset($_SESSION['user'])) {
        if (!$_SESSION['user']->IsAnonymous()) {
            $_SESSION['user']->Out();
        }
    }

    include '../view/login.php';
?>