<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];     
        echo $remember_login = (isset($_POST['remember']))? true: false;

        $user = new LogIn();
        $user->StartWithIdentifier($username,$password, $remember_login);
        $_SESSION['user'] = $user;

        $back = $_SERVER['HTTP_REFERER'];
        if ($_SESSION['user']->IsAnonymous()) {
            header('Location: http://localhost/final/control/C_Index.php?log-err=1');
            exit;
        }
        else {
            header('Location: http://localhost/final/control/C_Index.php');
            exit;
        }
    }
    else {
        header('Location: http://localhost/final/control/C_Index.php?log-err=1');
        exit;
    }
?>