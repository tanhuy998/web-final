<?php
    // controler for the shop page

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

    $prd = new Product();
    $result = $prd->SelectProductByTag($type);
    
    $temp1 = intval($result->num_rows / 8);
    $temp2 = ($result->num_rows % 8) == 0? 0 : 1;
    $currentPage = $_GET['page'];
    $maxPage = $temp1 + $temp2;

    include '../view/shop.php';
?>