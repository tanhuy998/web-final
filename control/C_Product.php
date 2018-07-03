<?php
    // controler for the shop page
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';
    require_once '../libs/LoginStatus.php';
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

    $type = "";
    if(isset($_GET['category'])) {
        $category = $_GET['category'];
                
        if ($category === "ao") {
            $type = "áo";
        }
        else if ($category === "quan") {
            $type = "quần";
        }
        else if ($category === "giay"){
            $type = "giày";
        }
        else {
            $type = $_GET['category'];
        }
    }
    $currentPage = $_GET['page'];
    $prd = new Product();
    $result = $prd->SelectProductByTagWithPage($type,intval($currentPage));
    //$result = $prd->SelectProductByTag($type);
    $product_count = $prd->ProductCountByTag($type);
    
    //$temp1 = intval($result->num_rows / 8);
    //$temp2 = ($result->num_rows % 8) == 0? 0 : 1;
    $temp1 = intval($product_count / 8);
    $temp2 = intval($product_count % 8) == 0? 0: 1;
    
    $maxPage = $temp1 + $temp2;
    echo $temp1;
    include '../view/shop.php';
?>