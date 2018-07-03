<?php
    require_once '../Product/model/M_product.php';
    require_once '../model/M_Product.php';
    require_once '../libs/LoginStatus.php';
    require_once '../libs/Cart-process.php';
    session_start();

    CartProcess();

    if (!isset($_SESSION['user'])) {
        $user = new Login();
        $user->Start();
        $_SESSION['user'] = $user;
    }

    if (isset($_GET['search'])) {
        $search_str = $_GET['search-str'];

        echo 1;
        $md = new ProductLogic();

        $search_arr = array();

        $search_arr = $md->SearchProduct($con_link,$search_str);

        $result = array();

        if (count($search_arr) > 0) {

            $prd = new Product();
            
            foreach ($search_arr as $id) {
                $resource = $prd->SelectProductByID($id);

                if ($resource->num_rows > 0) {
                    $result[] = $resource->fetch_assoc();
                }
            }
        }

        $maxPage = 1;

        include "../view/shop.php";
    }

?>