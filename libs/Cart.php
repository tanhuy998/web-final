<?php

    // function return an associative array that it's key is product ID and value is the quantity of the specified product chosen by user
    function GetCartList() {
        if (isset($_COOKIE['cart'])) {

            $productCartList = array();
            
            if ($_COOKIE['cart'] !== '') {
                $cartList_String = $_COOKIE['cart'];
                $cartList = explode(',',$cartList_String);
            
                foreach($cartList as $value) {
                    $singleProduct_cartDetail = explode('-',$value);
    
                    $id = $singleProduct_cartDetail[0];
                    $qty = $singleProduct_cartDetail[1];
                    
                    $productCartList["$id"] = $qty;
                }
            }
            
            return $productCartList;
        }
    }
?>