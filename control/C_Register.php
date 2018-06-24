<?php
    require_once '../libs/Cart-process.php';
    require_once '../libs/LoginStatus.php';
    session_start();
    
    CartProcess();

    if (!isset($_SESSION['user'])) {
        $user = new LogIn();
        $user->Start();
        
        $_SESSION['user'] = $user;
    }

    include '../view/dangkythanhvien.php';
?>