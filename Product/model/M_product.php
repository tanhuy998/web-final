<?php 
class Connection
{
	public function connect()
	{
		$con = new mysqli('localhost','root','','ecommerce');
		$con->set_charset('utf8');
		return $con;
	}
}
$connection = new Connection;
$con_link = $connection->connect();

class ProductLogic
{
	public function RetrieveProductID($con_link)
	{
				// <------------- BEGIN INSERT ------------> 

		//Spot if data alrdy exist
		$countQuery = "select * from product";
		$countRes  = $con_link->query($countQuery);
		$arrayToCheck = array();
		
		while ( $row = mysqli_fetch_array($countRes) ) 
		{
			$arrayToCheck[] = $row;
		}
		$res = count($arrayToCheck);

		//Available or Unavailable? 
		if($res > 0)
		{
			$sqlQuery = "SELECT ID from product order by ID desc limit 1";
			$exe = $con_link->query($sqlQuery)->fetch_object();
			return $exe->ID;
		}
		else
			return 0;
	}
	public function InsertProduct($con_link,$data,$table)
	{
		$dvalue = array_values($data);
		$dkey = array_keys($data);
		$value = implode("','",$dvalue);
		$key = implode("`,`",$dkey);
		$ins = "insert into $table (`$key`) values ('$value')";
		$ex = $con_link->query($ins);
		return $ex;
	}

		// <------------END INSERT---------->

				// ********************NEXT*****************************
		
		// <----------- BEGIN SEARCH --------->

	public function SearchProduct($con_link,$search_query)
	{
		/*product.ID,product.TENSANPHAM,product.GIA,product.MOTA,product_tag.TENTAG*/
		$sql = "select *  from product,product_tag,product_image
		 
			where product.ID = product_tag.IDSANPHAM and product_image.IDSANPHAM = product.ID 
			and product_tag.IDSANPHAM = product_image.IDSANPHAM
			and product_tag.TENTAG like '%$search_query%' ";
			
		$exe = $con_link->query($sql);
		$res = array();
		while ($fetch = $exe->fetch_object())
		{
			$res[] = $fetch;
		}
		return $res;
	}
	public function IfTagInSearchQuery($con_link,$search_query)
	{
		/*product.ID,product.TENSANPHAM,product.GIA,product.MOTA,product_tag.TENTAG*/
		$sql = "select *  from product,product_tag,product_image
		 
			where product.ID = product_tag.IDSANPHAM and product_image.IDSANPHAM = product.ID 
			and product_tag.IDSANPHAM = product_image.IDSANPHAM
			and product_tag.TENTAG like '%$search_query%' ";
			
		$exe = $con_link->query($sql);
		$res = array();
		while ($fetch = $exe->fetch_object())
		{
			$res[] = $fetch;
		}

		if (count($res) == 0)
			return false;
		return true;
	}
		// <-------------------END SEARCH ---------------------->

		// *********************NEXT*************
	
		
	//<-----------------------BEGIN UPDATE------------------->
	public function CheckID($con_link,$ID)
	{
		$sqlQuery = "select * from product where product.ID = $ID";
		$res = $con_link->query($sqlQuery)->fetch_object();
		if ($res)
			return true;
		return false;
	}

	public function UpdateProduct($con_link,$data,$table,$condition)
	{
		//Apropriate column names;
		if($table === 'product')	
			$specialTable = 'ID';
		else
			$specialTable = 'IDSANPHAM';

		//Extract array's components
		$dvalue = array_values($data);
		$dkey = array_keys($data);
		
		//Do the job
		for ($i=0; $i < count($dkey); $i++)
		{ 
			$update = "update $table set `$dkey[$i]` = '$dvalue[$i]' where $table.$specialTable = $condition";
			$exe = $con_link->query($update);
		}
		
		return $exe;
	}
	//<----------------------------END UPDATE----------------->

	
	//<-----------------------BEGIN DELETE------------------->
	public function DeleteProduct($con_link,$table,$ID)
	{
		//Apropriate column names;
		if($table === 'product')	
			$specialTable = 'ID';
		else
			$specialTable = 'IDSANPHAM';
		
		$delete = "delete from $table where here $table.$specialTable = $condition";
		$exe = $con_link->query($delete);
		return $exe;
	}
	//<----------------------------END DELETE ----------------->


	//<-----------------------BEGIN RETRIEVE------------------->
	public function RetrieveProducts($con_link)
	{
		$sql = "select * from product,product_image,product_tag where product.ID = product_image.IDSANPHAM and
		product_tag.IDSANPHAM = product.ID";
		$exe = $con_link->query($sql);
		$res = array();
		while ($tmp = $exe ->fetch_object())
		{
			$res[] = $tmp;
		}
		return $res;
	}
	//<-----------------------END RETRIEVE------------------->
}	




 ?>


