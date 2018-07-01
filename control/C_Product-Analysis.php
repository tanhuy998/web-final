<?php
    require_once '../recommend/Analysis.php';
    session_start();

    $Analysis = new AnalyticalSystem('DBbase');

    $Analysis->start();

    $back = $_SERVER['HTTP_REFERER'];
    echo "Hoàn tất đánh giá sản phẩm. <a href=\"$back\"> Trở về </a>";
    //header("Location: $back");
    //exit;
?>