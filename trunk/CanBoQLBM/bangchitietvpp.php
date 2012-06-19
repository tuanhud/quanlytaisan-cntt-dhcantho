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
		$query = "SELECT a.mavpp,b.tenvpp,b.tendonvitinh,c.tennsx,a.sl_vpp,a.dongia from covpp a, vanphongpham b,nhasanxuat c where a.mavpp=b.mavpp and c.mansx=b.mansx and a.maphieudutoan='".$_POST['cbo_maphieusua']."'";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = array(
				'idsua' => $row['mavpp'],
				'tensua' => $row['tenvpp'],
				'dvtsua' => $row['tendonvitinh'],
				'nsxsua' => $row['tennsx'],
				'soluongsua' => $row['sl_vpp'],
				'dongiasua' => $row['dongia'],
			  );
		}
		echo json_encode($data);
?>
