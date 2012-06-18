<?php
	#Include the connect.php file
	include('connect.php');
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
		$tendonvi = $_GET['tendonvithem']-1;
		$masocanbo = $_GET['masocanbo']-1;
		$tencanbo = $_GET['tencanbo']-1;
		$gioitinh = $_GET['gioitinh']-1;
		$ngaysinh = $_GET['ngaysinh']-1;
		$email = $_GET['email']-1;
		$diachi = $_GET['diachi']-1;
		$sodienthoai = $_GET['sodienthoai']-1;
		$matkhau = $_GET['matkhau']-1;
		
		$query = "SELECT * FROM temp";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
		{
			$data[] = array(
				'TenDV' => $row[$tendonvi],
				'MSCB' => $row[$masocanbo],
				'TenCB' => $row[$tencanbo],
				'GioiTinh' => $row[$gioitinh],
				'NgaySinh' => $row[$ngaysinh],
				'Email' => $row[$email],
				'DiaChi' => $row[$diachi],
				'SDT' => $row[$sodienthoai],
				'MatKhau' => $row[$matkhau]
			  );
		}
		echo json_encode($data);
?>