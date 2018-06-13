<?php
    require '../model/M_Database.php';

    class Product {

        public function __construct() {

        }

        public function SelectProductByTag($tag) {
            $db = new Database();
            $tag = "\'".$tag."\'";
            $sql = "SELECT * FROM product";//,product_tag WHERE product.ID = product_tag.IDSANPHAM AND product_tag.IDSANPHAM = ".$tag; //INNER JOIN product_tag ON product.ID = product_tag.IDSANPHAM"; //

            $result = $db->SelectData($sql);
            return $result;
        }
    }
?>