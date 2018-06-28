<?php 
include '../model/model.php';
$model = new Model;
if (isset($_REQUEST['insert_post']))
{
	//$id = $_POST['id'];
	//Getting ID from Product
	$sql = "select ID from product";
	//

	$name = $_POST['product_name'];
	$mota = $_POST['product_desc'];
	$gia = $_POST['product_price'];
	$hinhanh = $_POST['product_image'];
	$tag = $_POST['product_tags'];
	//ARRAY preparation 
	$dataProduct = array("TENSANPHAM"=>$name,"MOTA"=>$mota,"GIA"=>$gia);
	$log = $model->InsertProduct($con_link,$dataProduct,'product');
	//
	
}
?>