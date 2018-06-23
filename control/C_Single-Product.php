<?php
    // controller for the single product page
    require_once '../model/M_Product.php';
    require_once '../libs/Cart-process.php';
    require_once '../recommend/Recommend.php';
    require_once '../libs/LoginStatus.php';
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
        $product_tag_resource = $prd->SelectProductTagByProductID($id);
        $product_image_resource = $prd->SelectProductImageByProductID($id);
        //$temp = $product_image_resource;
        $Thumb_image;
        

        // get the first image from all images resourse of a product to be thumbnail image
        if ($product_image_resource->num_rows > 0) {
            $thumb_image = $product_image_resource->fetch_assoc();
        }
        // after fetch the first row in image resource for the thumbnail imag, the internal pointer is seeked to value 1(second)
        // then we seeked this resource agin to 0(first) for another fetching time to get all images
        $product_image_resource->data_seek(0);


        // get the product from product resourse get by sql command
        // because one product pairs to one ID so just only fetch the resource one time
        $product;
        if ($product_resource->num_rows > 0) {
            $product = $product_resource->fetch_assoc();
        }

        // for recommend 
        $rec = new RecommendSystem('DBbase');

        $rec_list = $rec->Recommend();
        $rec_product = array(); // remember this is an associative array
        foreach($rec_list as $key => $ID) {
            $resource = $prd->SelectProductByID($ID);
            $rec_product_list[] = $resource->fetch_assoc();
        }

        include '../view/single-product.php';
    }
?>