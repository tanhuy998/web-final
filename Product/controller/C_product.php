<?php 
include ('../model/M_product.php');
$model = new ProductLogic;
//SEARCH
if (isset($_REQUEST['Search']))
{
	$search_query = strtolower($_POST['user_query']);
	$contain = $model -> IfTagInSearchQuery($con_link,$search_query);
	if($contain)
	{
		$res = $model -> SearchProduct($con_link,$search_query);
	}
	

}
//<---END SEARCH --->

				/* NEXT */

//<-----BEGIN UPDATE------->


include_once ('../model/M_product.php');
$model = new ProductLogic;
if (isset($_POST['update_product']))
{
	$updatedID = $_POST['product_id'];
	$result = $model->CheckID($con_link,$updatedID);

	if ($result)
	{
		$name = $_POST['product_name'];
		$mota = $_POST['product_desc'];
		$gia = $_POST['product_price'];

		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$target_path = "../../img/".$product_image;
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,$target_path);

		//Split tags into tag
		$tag = $_POST['product_tags'];
		$tag_array = explode(',',$tag);
	
		//Array preparation 
		$dataProduct = array("TENSANPHAM"=>$name,"MOTA"=>$mota,"GIA"=>$gia);
		$dataWithImg = array("IDSANPHAM"=>$updatedID,"DUONGDAN"=>$product_image);
		
		//Update product-tag
		
		$delTagsFirst = $model->DeleteTags($con_link,$updatedID);
		foreach($tag_array as $tag) {
			$dataWithTag = array("IDSANPHAM"=>$updatedID,"TENTAG"=>$tag);
			$updateTag = $model ->InsertProduct($con_link,$dataWithTag,'product_tag');
		}
		//Update product and product_image
		$updatePro = $model -> UpdateProductWithoutTags($con_link,$dataProduct,'product',$updatedID);
		$updateImg = $model -> UpdateProductWithoutTags($con_link,$dataWithImg,'product_image',$updatedID);
	
		if ($updatePro && $updateImg && $updateTag)
		{
			echo "<script>alert('Sản phẩm đã được chỉnh sửa')</script>";
		}
		else
		{
			echo "<script>alert('Xin kiểm tra lại thông tin sản phẩm')</script>";
		}
	}
	else
	{
		echo "<script>alert('Sản phẩm không tồn tại ! Xin mời kiểm tra lại')</script>";
	}
}

//<------------END UPDATE------>

				/* NEXT */	
				

//<-----BEGIN INSERT----->

if (isset($_POST['insert_post']))
{
	
	$name = $_POST['product_name'];
	$mota = $_POST['product_desc'];
	$gia = $_POST['product_price'];

	$product_image = $_FILES['product_image']['name'];
	$target_path = "../../img/".$product_image;
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	move_uploaded_file($product_image_tmp,$target_path);
	$tag = $_POST['product_tags'];
	$tag_array = explode(',',$tag);

	
	$dataProduct = array("TENSANPHAM"=>$name,"MOTA"=>$mota,"GIA"=>$gia,"ACTIVE" => 1);
	
	//Insert into PRODUCT beforehand to get ID 
	$logPro = $model -> InsertProduct($con_link,$dataProduct,'product');
	//Get ID
	$resultID = $model->RetrieveProductID($con_link);
	//Array data for the rest 2 tables
	$dataWithImg = array("IDSANPHAM"=>$resultID,"DUONGDAN"=>$product_image);
	//Insert the rest 2 tables
	$logImg = $model -> InsertProduct($con_link,$dataWithImg,'product_image');
	$logTag = $model ->	InsertProduct($con_link,$dataWithTag,'product_tag');

	foreach($tag_array as $tag) {
		$dataWithTag = array("IDSANPHAM"=>$resultID,"TENTAG"=>$tag);
		$logTag = $model ->	InsertProduct($con_link,$dataWithTag,'product_tag');
	}
	
	if ($logTag)
	{
		echo "<script>alert('Sản phẩm đã được thêm')</script>";
	}
	else
	{
		echo "<script>alert('Xin kiểm tra lại thông tin sản phẩm !')</script>";
	}
	
}	

//<------END INSERT----->

				
			/* NEXT */

//FSDA
//<-----------------------BEGIN DELETE------------------->
if (isset($_GET['delete_product']))
{
	$IdToDel = $_GET['delete_product'];
	echo $IdToDel;
	
	$back = $_SERVER['HTTP_REFERER'];
	if ($model ->DeleteProduct($con_link,$IdToDel)) {
		echo "Đã cho sản phẩm ngừng kinh doanh  <a href=\"$back\"> Trở về</a>";
	}
	else {
		echo "Đã xảy ra lỗi trong quá trình thực hiện  <a href=\"$back\"> Trở về</a>";
	}
	// $delFromImg = $model ->DeleteProduct($con_link,'product_image',$IdToDel);
	// $defFromTag = $model ->DeleteProduct($con_link,'product_tag',$IdToDel);
}
//<------END DELETE----->

	
			/* NEXT */

//<-----------------------BEGIN RETRIEVE TO VIEW ALL PRO------------------->
//Admin or not?
// if(!isset($_SESSION['user_email']))
// {
	
// }
// else 
// {

// }
$pro = $model->RetrieveProducts($con_link);
//<------END RETRIEVE----->

?>
