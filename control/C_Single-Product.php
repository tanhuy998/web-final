<?php
    // controller for the single product page

    require '../model/M_Product.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $prd = new Product();

        $category = (isset($_GET['category']))? $_GET['category']: "null";

        $product_resource = $prd->SelectProductByID($id);
        $product_tag_resource = $prd->SelectProductTagByProductID($id);
        $product_image_resource = $prd->SelectProductImageByProductID($id);
        //$temp = $product_image_resource;
        $Thumb_image;
        $product;

        // get the first image from all images resourse of a product to be thumbnail image
        if ($product_image_resource->num_rows > 0) {
            $thumb_image = $product_image_resource->fetch_assoc();
        }
        // after fetch the first row in image resource for the thumbnail imag, the internal pointer is seeked to value 1(second)
        // then we seeked this resource agin to 0(first) for another fetching time to get all images
        $product_image_resource->data_seek(0);


        // get the product from product resourse get by sql command
        // because one product pairs to one ID so just only fetch the resource one time
        if ($product_resource->num_rows > 0) {
            $product = $product_resource->fetch_assoc();
        }

        include '../view/single-product.php';
    }
?>