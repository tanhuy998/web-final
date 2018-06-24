<?php
    function GetRecommendProduct(array $rec_list) {
        $prd = new Product();

        $rec_product_list = array();
        foreach($rec_list as $key => $ID) {
            $resource = $prd->SelectProductByID($ID);
            $rec_product_list[] = $resource->fetch_assoc();
        }

        return $rec_product_list;
    }
?>