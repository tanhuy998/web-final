<?php
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';

    CartProcess();

    include '../view/checkout.php';

?>