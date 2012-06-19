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
		 $insert_query = "insert into `taisanthuocdonvi`(MSDV,MaTaiSan) values('".$_GET['MSDV']."','".$_GET['MaTaiSan']."')";
		 $result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `taisanthuocdonvi` WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' AND `MSDV`='".$_GET['MSDV']."'";
		 $result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else */ 
	/*if (isset($_GET['check']))
	{
		// SELECT COMMAND 
		$select_query = "SELECT * FROM nguoidung a, coquyen b, quyen c where a.MSCB=b.MSCB and b.MaQuyen=c.MaQuyen and a.MSCB='".$_GET['MSCB']."'";
		$result = mysql_query($select_query) or die("SQL Error 1: " . mysql_error());
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
		{
			$employees[] = array(
				'MQ' => $row['MaQuyen'],
			  );
		}
		echo json_encode($employees);
	}
	else*/
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM nguoidung LIMIT $start, $pagesize";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'MSCB' => $row['MSCB'],
				'TenCB' => $row['TenCB'],
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
?>