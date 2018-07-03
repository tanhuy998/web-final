<?php
    //header('Content-type: text/plain; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

                <?php
                    //require '../control/C_Product.php';
                    

                    

                    //$db = new Database();
                    //$sql = "SELECT * FROM product JOIN product_tag IN product.ID = product_tag.IDSANPHAM WHERE product_tag.TENTAG = \"".$type."\"";
                    
                    foreach ($result as $row) {
                        $image = $prd->SelectProductImageByProductID($row['ID']);
                        $thumb = $image->fetch_assoc();
                            
                        echo "<div class=\"col-md-3 col-sm-6\">";
                        echo "<div class=\"single-shop-product\">";
                        echo    "<div class=\"product-upper\">";
                        echo        "<a href=\"http://localhost/final/control/C_Single-product.php?id=".$row['ID']."&category=\"><img src=\"".'../img/'.$thumb['DUONGDAN']."\" alt=\"img\"></a>";
                        echo   "</div>";
                        echo    "<h2><a href=\"http://localhost/final/control/C_Single-product.php?id=".$row['ID']."&category=\">".$row['TENSANPHAM']."</a></h2>";
                        echo    "<div class=\"product-carousel-price\">";
                        echo        "<ins>".$row['GIA']."</ins>";
                        echo     "</div>";
                                
                        echo    "<div class=\"product-option-shop\">";
                        echo        "<a class=\"add_to_cart_button\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"70\" rel=\"nofollow\" href=\"#\" onclick=\"AddCartProductCookie(".$row['ID'].",'1')\">Thêm vào giỏ</a>";
                        echo    "</div></div> </div>";
                    }
                    
                    // if ($result->num_rows > 0) {
                    //     while ($row = $result->fetch_assoc()) {
                            
                    //         $image = $prd->SelectProductImageByProductID($row['ID']);
                    //         $thumb = $image->fetch_assoc();
                            
                    //         echo "<div class=\"col-md-3 col-sm-6\">";
                    //         echo "<div class=\"single-shop-product\">";
                    //         echo    "<div class=\"product-upper\">";
                    //         echo        "<a href=\"http://localhost/final/control/C_Single-product.php?id=".$row['ID']."&category=".$type."\"><img src=\"".$thumb['DUONGDAN']."\" alt=\"img\"></a>";
                    //         echo   "</div>";
                    //         echo    "<h2><a href=\"http://localhost/final/control/C_Single-product.php?id=".$row['ID']."&category=".$type."\">".$row['TENSANPHAM']."</a></h2>";
                    //         echo    "<div class=\"product-carousel-price\">";
                    //         echo        "<ins>".$row['GIA']."</ins>";
                    //         echo     "</div>";
                                
                    //         echo    "<div class=\"product-option-shop\">";
                    //         echo        "<a class=\"add_to_cart_button\" data-quantity=\"1\" data-product_sku=\"\" data-product_id=\"70\" rel=\"nofollow\" href=\"#\" onclick=\"AddCartProductCookie(".$row['ID'].",'1')\">Thêm vào giỏ</a>";
                    //         echo    "</div></div> </div>";
                    //     }
                    // }
                    // else echo "ERROR";
                ?>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="<?php if($currentPage != 1) { echo "http://localhost/final/control/C_Product.php?category=ao&page=".($currentPage - 1);} else {echo "#";}?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?php
                                for ($i = 1; $i <= $maxPage; ++$i) {
                                    echo "<li><a href=\"http://localhost/final/control/C_Product.php?category=ao&page=$i\">$i</a></li>";
                                }
                            ?>
                            <li>
                              <a href="<?php if($currentPage != $maxPage) { echo "http://localhost/final/control/C_Product.php?category=ao&page=".($currentPage + 1);} else {echo "#";}?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
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