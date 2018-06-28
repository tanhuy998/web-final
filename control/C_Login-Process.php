<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    // if (isset($_REQUEST['login'])) {
        
    // }
    if (isset($_POST['username']) && isset($_POST['password'])) {
        echo 'Log';
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username.'<br>'.$password;
        //echo $remember_login = (isset($_POST['remember']))? true: false;

        $user = new LogIn();
        $user->StartWithIdentifier($username,$password);
        $_SESSION['user'] = $user;

        $back = $_SERVER['HTTP_REFERER'];
        if ($_SESSION['user']->IsAnonymous()) {
            echo ' found';
            header('Location: http://localhost/final/control/C_Index.php?log-err=2');
            exit;
        }
        else {
            header('Location: http://localhost/final/control/C_Index.php');
            exit;
        }
    }
    else {
        echo 'norequest';
        header('Location: http://localhost/final/control/C_Index.php?log-err=1');
        exit;
    }
?>