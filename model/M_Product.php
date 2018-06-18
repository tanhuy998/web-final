<?php
    require 'M_Database.php';

    class Product {

        public function __construct() {

        }

        public function SelectAllProduct() {
            $db = new Database();

            $sql = 'SELECT * FROM product'; //INNER JOIN product_tag ON product.ID = product_tag.IDSANPHAM"; //

            $result = $db->SelectData($sql);
            return $result;
        }

        public function SelectProductByTag($tag) {
            $db = new Database();
            //$tag = "\'".$tag."\'";
            $sql = "SELECT * FROM product,product_tag WHERE product.ID = product_tag.IDSANPHAM AND product_tag.TENTAG = '$tag'"; //INNER JOIN product_tag ON product.ID = product_tag.IDSANPHAM"; //

            $result = $db->SelectData($sql);
            return $result;
        }

        public function SelectProductByID($id) {
            $db = new Database();

            $sql = "SELECT * FROM product WHERE product.ID = '$id'";

            $result = $db->SelectData($sql);
            return $result;
        }

        public function SelectProductTagByProductID($productID) {
            $db = new Database();

            $sql = "SELECT * FROM product_tag WHERE product_tag.IDSANPHAM = '$productID'";

            $result = $db->SelectData($sql);
            return $result;
        }

        public function SelectProductImageByProductID($productID) {
            $db = new Database();

            $sql = "SELECT * FROM product_image WHERE product_image.IDSANPHAM = '$productID'";

            $result = $db->SelectData($sql);
            return $result; 
        }

        public function SelectProductThumbnailImageByProductID($productID) {
            $db = new Database();

            $sql = "SELECT * FROM Product_image WHERE product_image.IDSANPHAM = '$productID' LIMIT 1";

            $result = $db->SelectData($sql);
            return $result;
        }
    }
?>`