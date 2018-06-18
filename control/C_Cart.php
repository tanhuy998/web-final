<?php 
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';

    CartProcess();

    if (isset($_COOKIE['cart'])) {

        $productCartList = array();
        $productThumbImage = array();
        $quantity = array();
        $cartSubtotal = 0;
        
        if ($_COOKIE['cart'] !== '') {
            $cartList_String = $_COOKIE['cart'];
            $cartList = explode(',',$cartList_String);

            $prd = new Product();
        
            foreach($cartList as $value) {
                $singleProduct_cartDetail = explode('-',$value);

                $id = $singleProduct_cartDetail[0];
                $qty = $singleProduct_cartDetail[1];

                $quantity["$id"] = $qty;

                $product_resource = $prd->SelectProductByID($id);
                $row = $product_resource->fetch_assoc();
            
                $productCartList[] = $row;
            
                $thumbnail_resource = $prd->SelectProductThumbnailImageByProductID($id);
                $productThumbImage["$id"] = $thumbnail_resource->fetch_assoc();
            }
        } 

        include '../view/cart.php';
    }
?>