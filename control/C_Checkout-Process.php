<?php
    $checkout_cond = true;
    if (isset($_POST['checkout'])) {

        $address = $_POST['billing_address'];

        if ($_SESSION['user']->PlaceOrder($address)) {
            echo 'succ';
        }
        else {
            echo 'failed';
        }
    }
?>