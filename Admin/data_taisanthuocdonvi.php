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

	if (isset($_GET['update']))
	{
		// UPDATE COMMAND 
		$update_query = "UPDATE `taisanthuocdonvi` SET
		`SoLuongCuaDonVi`='".$_GET['SoLuongCuaDonVi']."',
		`DonGiaTS`='".$_GET['DonGiaTS']."' WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' and `MSDV`='".$_GET['MSDV']."'";
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
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
	else 
	{
		$madonvi = $_GET['madonvi'];
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM taisan a, taisanthuocdonvi b, donvi c where a.MaTaiSan=b.MaTaiSan and b.MSDV=c.MSDV LIMIT $start, $pagesize";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'MSDV' => $row['MSDV'],
				'TenDV' => $row['TenDV'],
				'MaTaiSan' => $row['MaTaiSan'],
				'TenTaiSan' => $row['TenTaiSan'],
				'SoLuongCuaDonVi' => $row['SoLuongCuaDonVi'],
				'DonGiaTS' => $row['DonGiaTS']
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
?>