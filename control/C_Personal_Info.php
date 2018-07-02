<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    $personal_info = $_SESSION['user']->GetInformation();

    $temp = $personal_info['NGSINH'];
    $date = date('Y-m-d', strtotime($temp));
    include '../view/update_personal_info.php';
?>