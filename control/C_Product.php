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

    include '../view/shop.php';
?>