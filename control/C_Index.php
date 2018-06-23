<?php
    require_once '../libs/Cart-process.php';
    require_once '../libs/LoginStatus.php';
    session_start();
    
    
    //$_SESSION['user'] = $user;
    if ( !isset($_SESSION['user'])){
        echo 'TA';
        $user = new LogIn();
        $user->Start();
        $_SESSION['user'] = $user;
        //echo $->IsAnonymous()?1:0;
        //echo $user->GetInformation()['TEN'];
    }

    echo $_SESSION['user']->IsAnonymous();
    //echo '<br>'.hashCode('user');

    CartProcess();
    
    include '../view/index.php';
?>