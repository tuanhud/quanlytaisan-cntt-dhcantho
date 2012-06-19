<?php
	#Include the connect.php file
	include('connect.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False)
	{
	   print "can't find $database";
	} 
		$query = "SELECT a.mavpp,a.tenvpp,a.tendonvitinh,b.tennsx,a.dongiavpp FROM vanphongpham a, nhasanxuat b where a.Mansx=b.Mansx";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = array(
				'id' => $row['mavpp'],
				'ten' => $row['tenvpp'],
				'dvt' => $row['tendonvitinh'],
				'nsx' => $row['tennsx'],
				'soluong' => 1,
				'dongia' => $row['dongiavpp'],
			  );
		}
		echo json_encode($data);
?>
