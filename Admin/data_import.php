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

	/*if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		$update_query = "UPDATE `taisanthuocdonvi` SET
		`SoLuongCuaDonVi`='".$_GET['SoLuongCuaDonVi']."',
		`DonGiaTS`='".$_GET['DonGiaTS']."' WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' and `MSDV`='".$_GET['MSDV']."'";
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}*/
	/*else if (isset($_GET['insert']))
	{
		// INSERT COMMAND 
		$insert_query = "insert into `taisanthuocdonvi` values(`MSDV`='".$_GET['MSDV']."',`MaTaiSan`='".$_GET['MaTaiSan']."',`SoLuongCuaDonVi`='".$_GET['SoLuongCuaDonVi']."',`DonGiaTS`='".$_GET['DonGiaTS']."')";
		 $result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}*/
	/*else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$update_query = "UPDATE `taisan` SET `TenDonViTinh`='".$_GET['TenDonViTinh']."',
		`MaLoai`='".$_GET['MaLoai']."',
		`TenTaiSan`='".$_GET['TenTaiSan']."',
		`TinhTrang`='".$_GET['TinhTrang']."' WHERE `MaTaiSan`='".$_GET['MaTaiSan']."'";
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}*/
		
		$query = "SELECT * FROM temp";
		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
		{
			$$data[] = array(
				'TenDV' => $row[$_GET['tendonvi']-1],
				'MSCB' => $row[$_GET['masocanbo']-1],
				'TenCB' => $row[$_GET['tencanbo']-1],
				'GioiTinh' => $row[$_GET['gioitinh']-1],
				'NgaySinh' => $row[$_GET['ngaysinh']-1],
				'Email' => $row[$_GET['email']-1],
				'DiaChi' => $row[$_GET['diachi']-1],
				'SDT' => $row[$_GET['sodienthoai']-1],
				'MatKhau' => $row[$_GET['matkhau']-1]
			  );
		}
		echo json_encode($data);
?>