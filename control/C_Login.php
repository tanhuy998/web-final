<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new LogIn();
        $user->StartWithIdentifier($username,$password);
        $_SESSION['user'] = $user;

        if ($_SESSION['user']->IsAnonymous()) {
            header('Location: http://localhost/final/control/C_Checkout.php?log-err=1');
            exit;
        }
        else {
            header('Location: http://localhost/final/control/C_Checkout.php');
            exit;
        }
    }
    else {
        header('Location: http://localhost/final/control/C_Checkout.php?log-err=1');
        exit;
    }
?>