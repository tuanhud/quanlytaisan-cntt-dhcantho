<?php
session_start();
	#Include the connect.php file
	include('../GiangVien/connect.php');
	include('../database.php');
	$db=new database();
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
		$sql = "Select max(makhms) from kehoachmuasam";
		$db->setQuery($sql);
		$result = $db->fetchAll();
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$ma = $row[0]+1;
		// INSERT COMMAND 
		//insert yeu cau thiet bi
		 $insert_query1 = "insert into `kehoachmuasam` values('".$ma."','".$_SESSION['msclb']."','0','0')";
		 $result = mysql_query($insert_query1) or die("SQL Error 1: " . mysql_error());
		 //insert bang thuocquyvpp
		  $insert_query2 = "insert into `nammuasam` values('".$ma."','".$current['year']."')";
		 $result = mysql_query($insert_query2) or die("SQL Error 1: " . mysql_error());
		 $insert_query3 = "insert into `thuocdonvimuasam` values('".$ma."','".$_SESSION['madv']."')";
		 $result = mysql_query($insert_query2) or die("SQL Error 1: " . mysql_error());
		 if($result!=1)
					{
						echo 0;
						exit;
					}
					else
					{
						echo 1;
						exit;
					}

/*	else 
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
				'DonGiaTS' => $row['DonGiaTS'],
				'ThanhTien' => $row['DonGiaTS']*$row['SoLuongCuaDonVi']
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}*/
?>