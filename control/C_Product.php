<?php
    // controler for the shop page
    session_start();
    require '../model/M_Product.php';
    require '../libs/Cart-process.php';
    

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
    $product_count = $prd->ProductCount();

    //$temp1 = intval($result->num_rows / 8);
    //$temp2 = ($result->num_rows % 8) == 0? 0 : 1;
    $temp1 = intval($product_count / 8);
    $temp2 = intval($product_count % 8) == 0? 0: 1;
    
    $maxPage = $temp1 + $temp2;

    include '../view/shop.php';
?>