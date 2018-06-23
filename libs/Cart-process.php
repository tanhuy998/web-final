<?php
    require_once '../model/M_Product.php';

    function CartProcess() {

        $quantity = 0;
        $total = 0;

        if (isset($_COOKIE['cart'])) {

            $cartList_String = $_COOKIE['cart'];

            if ($cartList_String != '') {
                $cartList = explode(',',$cartList_String);

                $prd = new Product();
        
                foreach($cartList as $value) {
                    $singleProduct_cartDetail = explode('-',$value);

                    $id = $singleProduct_cartDetail[0];

                    ++$quantity;

                    $product_resource = $prd->SelectProductByID($id);
                    $row = $product_resource->fetch_assoc();
            
                    $total += intval($row['GIA']) * intval($singleProduct_cartDetail[1]);

                }
            }
            
        }


        $GLOBALS['cart-qty'] = $quantity;
        $GLOBALS['cart-total'] = $total;
        echo 'process';
    }

?>