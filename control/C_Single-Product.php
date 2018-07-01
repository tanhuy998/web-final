<?php
    // controller for the single product page
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';
    require_once '../recommend/Recommend.php';
    require_once '../libs/LoginStatus.php';
    require_once '../libs/RecommendProduct.php';
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

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $prd = new Product();

        // to remember that the user has visited this product 
        $track = new Tracker();
        $track->Add($id);
        

        //$category = (isset($_GET['category']))? $_GET['category']: "null";

        $product_resource = $prd->SelectProductByID($id);
        echo 'id['.$id.']';
        $product_tag_resource = $prd->SelectProductTagByProductID($id);
        $product_image_resource = $prd->SelectProductImageByProductID($id);
        //$temp = $product_image_resource;
        $thumb_image;
        

        // get the first image from all images resourse of a product to be thumbnail image
        if ($product_image_resource->num_rows > 0) {
            $thumb_image = $product_image_resource->fetch_assoc();
        }
        // after fetch the first row in image resource for the thumbnail imag, the internal pointer is seeked to value 1(second)
        // then we seeked this resource agin to 0(first) for another fetching time to get all images
        //$product_image_resource->data_seek(0);


        // get the product from product resourse get by sql command
        // because one product pairs to one ID so just only fetch the resource one time
        $product;
        if ($product_resource->num_rows > 0) {
            $product = $product_resource->fetch_assoc();
            echo 'P['.$product['ID'].']';
        }

        $reviews_resource = $prd->SelectCommentByProductID($product['ID']);


        $prd = new Product();
        $new_product = $prd->SelectTop5NewProduct();

        // for recommend 
        $rec = new RecommendSystem('DBbase');

        $rec_list = $rec->Recommend();

        $rec_product_list = GetRecommendProduct($rec_list); // remember this is an associative array
        echo 'rec['.count($rec_list).']';
        $rec_product_thumb = array();

        foreach ($rec_product_list as $rec_product) {
            $id = $rec_product['ID'];
            $resource = $prd->SelectProductImageByProductID($id);

            $rec_product_thumb["$id"] = $resource->fetch_assoc();
        }

        include '../view/single-product.php';
    }
?>