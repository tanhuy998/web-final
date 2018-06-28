<?php 
class Connection
{
	public function connect()
	{
		$con = new mysqli('localhost','root','','ecommerce');
		return $con;
	}
}
$connection = new Connection;
$con_link = $connection->connect();

//Generating 
class Model
{
	public function RetrieveInfo($con_link,$table)
	{
		$sql = "select *from table";
		$exe = $con_link->query($sql);
		$r = array();
		while ($ft = $exe->fetch_object())
		{
			$r[] = $ft;
		}
		return $r;
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

}
 ?>
