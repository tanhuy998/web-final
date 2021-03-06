<?php 
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';
    require_once '../recommend/Recommend.php';
    require_once '../libs/LoginStatus.php';
    require_once '../libs/RecommendProduct.php';
    session_start();


    if ( !isset($_SESSION['user'])){
        echo 'TA';
        $user = new LogIn();
        $user->Start();
        $_SESSION['user'] = $user;
        //echo $->IsAnonymous()?1:0;
        //echo $user->GetInformation()['TEN'];
    }
    echo $_SESSION['user']->IsAnonymous();


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
            
                $thumbnail_resource = $prd->SelectProductImageByProductID($id);
                $productThumbImage["$id"] = $thumbnail_resource->fetch_assoc();
            }
        } 

        $prd = new Product();
        $new_product = $prd->SelectTop5NewProduct();

        // for recommend
        $rec = new RecommendSystem('DBbase');

        $rec_list = $rec->Recommend();
        
        $rec_product_list = GetRecommendProduct($rec_list); // remember this is an associative array

        include '../view/cart.php';
    }
?>