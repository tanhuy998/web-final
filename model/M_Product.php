<?php
    require_once 'M_Database.php';

    class Product {

        public function __construct() {

        }

        public function SelectAllProduct() {
            $db = new Database();

            $sql = 'SELECT * FROM product'; //INNER JOIN product_tag ON product.ID = product_tag.IDSANPHAM"; //

            $result = $db->SelectData($sql);
            return $result;
        }

        public function SelectTop5NewProduct() {
            $db = new Database();

            $sql = 'SELECT * FROM product ORDER BY product.ID DESC LIMIT 5';

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


        // one page contain 12 product
        public function SelectProductByTagWithPage($tag,int $page) {
            $db = new Database();

            $sql = "SELECT product.ID,product.TENSANPHAM,product.MOTA,product.GIA FROM product,product_tag WHERE product.ID = product_tag.IDSANPHAM AND product_tag.TENTAG = '$tag' ORDER BY product.ID DESC";

            $resource = $db->SelectData($sql);

            $temp = intval($resource->num_rows / 8); // chia lấy phần nguyên
            $temp1 = (intval($resource->num_rows) % 8 == 0)? 0 : 1; // chia lấy phần dư
            $table_total_page = intval($temp) + intval($temp1); // total page can be listed

            if ($page <= $table_total_page) {
                $index = ($page == 1)? 0 : ($page - 1)*8;
                $resource->data_seek($index);

                $result = array();

                for ($i = $index; $i < $page*8 && $i < $resource->num_rows; ++$i) {
                    $result[] = $resource->fetch_assoc();
                }

                return $result;
            }
            else {
                return false;
            }
        }

        public function ProductCountByTag($tag) {
            $db = new Database();

            $sql = "SELECT COUNT(*) FROM product INNER JOIN product_tag ON product.ID = product_tag.IDSANPHAM WHERE product_tag.TENTAG = '$tag'";

            $resource = $db->SelectData($sql);
            $result = $resource->fetch_assoc();

            return $result['COUNT(*)'];
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

        public function InsertComment($_uID, $_pID, string $_content) {
             $db = new Database();

             $sql = "INSERT INTO product_comment (IDSANPHAM, IDTAIKHOAN, NOIDUNG, DANHGIA) VALUES ('$_pID', '$_uID', '$_content', '4')";

             if ($db->InsertData($sql)) {
                return true;
             }
             else {
                return false;
                
             }
        }

        public function SelectCommentByProductID($_pID) {
            $db = new Database();

            $sql = "SELECT product_comment.ID, product_comment.IDSANPHAM, product_comment.IDTAIKHOAN, product_comment.NOIDUNG, product_comment.DANHGIA, account_information.TEN FROM product_comment join account_information ON account_information.IDTAIKHOAN = product_comment.IDTAIKHOAN WHERE IDSANPHAM = '$_pID' ORDER BY product_comment.ID DESC";

            $result = $db->SelectData($sql);

            return $result;
        }

    }
?>`