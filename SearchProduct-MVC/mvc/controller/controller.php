<?php 
include ('model/model.php');
$model = new Model;
if (isset($_REQUEST['submit']))
{
	//$id = $_POST['id'];
	$name = $_POST['tensp'];
	$mota = $_POST['mota'];
	$gia = $_POST['gia'];
	$hinhanh = $_POST['hinhanh'];
	$tag = $_POSt['tags'];
	$dataProduct = array("name"=>$name,"mota"=>$mota,"gia"=>$gia);
	$log = $model->InsertProduct($con_link,$dataProduct,'product');

	$dataProductImage = array("id"=>$id,"")
}
 ?>