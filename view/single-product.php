<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eElectronics - HTML eCommerce Template</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="http://localhost/final/css/owl.carousel.css">
    <link rel="stylesheet" href="http://localhost/final/css/style.css">
    <link rel="stylesheet" href="http://localhost/final/css/responsive.css">
    <link rel="stylesheet" href="http://localhost/final/css/dropstyle.css">
    <script type="text/javascript" src="../js/lib.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        <?php
                            if ($_SESSION['user']->IsAdmin()) {
                                echo "<li><a href=\"http://localhost/final/control/C_Personal_Info.php\"><i class=\"fa fa-user\"></i>".$_SESSION['user']->GetInformation()['TEN']."</a></li>";
                                echo "<li><a href=\"http://localhost/final/view/thanhvien.php\"><i class=\"fa fa-user\"></i> Quản lý thành viên</a></li>";
                                echo "<li><a href=\"http://localhost/final/Product/view/V_ViewProduct.php\"><i class=\"fa fa-user\"></i> Quản lý Sản phẩm</a></li>";
                                echo "<li><a href=\"http://localhost/final/Product/view/V_InsertProduct.php\"><i class=\"fa fa-user\"></i> Thêm sản phẩm</a></li>";
                                echo "<li><a href=\"http://localhost/final/view/order_list.php\"><i class=\"fa fa-user\"></i> Chi tiết hóa đơn</a></li>";


                                echo "<li><a href=\"http://localhost/final/control/C_Logout.php\"><i class=\"fa fa-user\"></i> Đăng xuất</a></li>";
                            }
                            else if ($_SESSION['user']->IsAnonymous()) {
                                echo "<li><a href=\"http://localhost/final/control/C_Login.php\"><i class=\"fa fa-user\"></i> Đăng nhập</a></li>";
                                echo "<li><a href=\"http://localhost/final/control/C_Register.php\"><i class=\"fa fa-user\"></i> Đăng kí</a></li>";
                            }
                            else {
                                echo "<li><a href=\"http://localhost/final/control/C_Personal_Info.php\"><i class=\"fa fa-user\"></i>".$_SESSION['user']->GetInformation()['TEN']."</a></li>";
                                echo "<li><a href=\"http://localhost/final/control/C_Logout.php\"><i class=\"fa fa-user\"></i> Đăng xuất</a></li>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>
                
                <!-- <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.html">e<span>Electronics</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                    <a href="cart.html">Giỏ hàng - <span class="cart-amunt"><?php echo $GLOBALS['cart-total'];?> VNĐ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $GLOBALS['cart-qty'];?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">TRANG CHỦ</a></li>
                        <li >
                            <div class="dropdown">
                                <button class="dropbtn">SẢN PHẨM</button>
                                <div class="dropdown-content">
                                  <a href="http://localhost/final/control/C_Product.php?category=ao&page=1">ÁO</a>
                                  <a href="http://localhost/final/control/C_Product.php?category=quan&page=1">QUẦN</a>
                                  <a href="http://localhost/final/control/C_Product.php?category=giay&page=1">GIÀY DÉP</a>
                                </div>
                            </div>
                        </li>
                        <!--<li><a href="#">Single product</a></li> -->
                        <li><a href="http://localhost/final/control/C_Cart.php">GIỎ HÀNG</a></li>
                        <li><a href="http://localhost/final/control/C_Checkout.php">THANH TOÁN</a></li>
                        <!-- <li><a href="#">Category</a></li> -->
                        <!-- <li><a href="#">Others</a></li> -->
                        <li><a href="http://localhost/final/view/lienhe.php">LIÊN HỆ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm</h2>
                        <form action="http://localhost/final/control/C_Search.php" method="get">
                            <input type="text" name="search-str" placeholder="Search products...">
                            <input type="submit" value="Search" name="search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <?php
                            if (count($rec_product_list) > 0) {
                                echo '<h2 class="sidebar-title">Sản phẩm đề xuất</h2>';

                                foreach($rec_product_list as $rec_product) {
                                    $id = $rec_product['ID'];
                                    echo '<div class="thubmnail-recent">';
                                    echo "<img src=\"../img/".$rec_product_thumb["$id"]['DUONGDAN']."\" class=\"recent-thumb\" alt=\"\">";
                                    echo "<h2><a href=\"http://localhost/final/control/C_Single-Product.php?id=".$rec_product['ID']."\">".$rec_product['TENSANPHAM']."</a></h2>";
                                    echo "<div class=\"product-sidebar-price\"><ins>".$rec_product['GIA']." VNĐ</ins></div></div>";
                                }
                            }
                        ?>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm mới</h2>
                        <ul>
                            <?php
                                if ($new_product->num_rows > 0) {
                                    while($row = $new_product->fetch_assoc()) {
                                        echo '<li><a href="http://localhost/final/control/C_Single-Product.php?id='.$row['ID'].'">'.$row['TENSANPHAM'].'</a></li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="<?php echo '../img/'.$thumb_image['DUONGDAN'];?>" alt="thumbnail">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <?php
                                            if ($product_image_resource->num_rows >0) {
                                                while ($row = $product_image_resource->fetch_assoc()) {
                                                    echo "<img src=\"".$row['DUONGDAN']."\" alt=\"image\">";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
									<?php
										if (isset($_GET['rev-error'])) {
											echo '<p><font color="red">*Bạn không thể để lại đánh giá khi bỏ trống ô đánh giá!</font></p>';
										}
									?>
                                    <h2 class="product-name"><?php echo $product['TENSANPHAM'];?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $product['GIA']?> VNĐ</ins>
                                    </div>    
                                    
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" id="#quantity" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="button" onclick="AddCartProductCookie('<?php echo $product['ID'];?>',GetProductQuantity('#quantity'))">Thêm vào giỏ</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>
                                            <?php
                                                echo "Tags: ";
                                                $tagCount = 0;

                                                if ($product_tag_resource->num_rows > 0) {
                                                    while ($row = $product_tag_resource->fetch_assoc()) {
                                                        $tagCount += 1;
                                                        $char = ($tagCount === $product_tag_resource->num_rows )? "":", ";
                                                        
                                                        echo "<a href=\"http://localhost/final/control/C_product.php?category=".$row['TENTAG']."&page=1\">".$row['TENTAG'].$char."</a>";
                                                    }
                                                }
                                            ?>
                                            
                                        </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Mô tả sản phẩm</h2>  
                                                <p>
                                                    <?php
                                                        function EndlineForParagraphTag($paragraph) {
                                                            $res = str_replace("\n","<br>",$paragraph);
                                                            return $res;
                                                        }
                                                        $description = EndlineForParagraphTag($product['MOTA']);
                                                        echo $description;
                                                    ?>
                                                </p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <?php
                                                    if (!$_SESSION['user']->IsAnonymous()) {

														//if (!$_SESSION['user']->Commented($product['ID'])) {
															echo '<h2>Đánh giá của bạn</h2>';
                                                        	echo '<div class="submit-review"><form action="http://localhost/final/control/C_Review-Process.php?id='.$product['ID'].'" method="post">';
                                                        	echo '<p><textarea name="review" id="" cols="30" rows="10"></textarea></p>';
                                                        	echo '<p><input type="submit" value="Gửi"></p></form></div>';
														// }
														// else {
														//  	echo '<p><label>*Bạn đã đánh giá cho sản phẩm này</label></p>';
														// }
                                                    }
                                                ?> 

                                                <?php
												echo '<h2>Đánh giá khác</h2>';
												echo '<hr>';
													if ($reviews_resource->num_rows > 0) {
														while ($row = $reviews_resource->fetch_assoc()) {
															// echo '<div class="submit-review">';
															echo '<p><label for="review">'.$row['TEN'].': </label> '.$row['NOIDUNG'].'</p><hr>';
															// echo '</div>';
														}
													}
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="">Mobile Phone</a></li>
                            <li><a href="">Home accesseries</a></li>
                            <li><a href="">LED TV</a></li>
                            <li><a href="">Computer</a></li>
                            <li><a href="">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="../js/main.js"></script>
  </body>
</html>