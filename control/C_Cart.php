<?php 
    session_start();
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';
    require_once '../recommend/Recommend.php';


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

        // for recommend
        $rec = new RecommendSystem('DBbase');

        $rec_list = $rec->Recommend();
        $rec_product = array(); // remember this is an associative array

        $prd = new Product();
        foreach($rec_list as $key => $ID) {
            $resource = $prd->SelectProductByID($ID);
            $rec_product_list[] = $resource->fetch_assoc();
        }

        include '../view/cart.php';
    }
?>