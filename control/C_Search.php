<?php
    require_once '../Product/model/M_product.php';

    if (isset($_POST['search'])) {
        $search_str = $_POST['search-str'];

        $md = new ProductLogic();

        $search_arr = array();

        $search_arr = $md->SearchProduct($con_link,$search_str);
    }


    $md = new ProductLogic();

    $search_arr = array();

    $search_arr = $md->SearchProduct($con_link,'áo thun');
    
    var_dump($search_arr);
?>