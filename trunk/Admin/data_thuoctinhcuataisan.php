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
		$update_query = "UPDATE `cothuoctinh` SET
		`GiaTriThuocTinh`='".$_GET['GiaTriThuocTinh']."' WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' and `MaThuocTinh`='".$_GET['MaThuocTinh']."'";
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['insert']))
	{
		// INSERT COMMAND 
		$insert_query = "insert into `cothuoctinh` values('".$_GET['MaTaiSan']."','".$_GET['MaThuocTinh']."','".$_GET['GiaTriThuocTinh']."')";
		 $result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `cothuoctinh` WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' AND `MaThuocTinh`='".$_GET['MaThuocTinh']."'";
		 $result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else 
	{
		$pagenum = $_GET['pagenum'];
		$pagesize = $_GET['pagesize'];
		$start = $pagenum * $pagesize;
		$query = "SELECT SQL_CALC_FOUND_ROWS * FROM taisan a, cothuoctinh b, thuoctinh c where a.MaTaiSan=b.MaTaiSan and b.MaThuocTinh=c.MaThuocTinh LIMIT $start, $pagesize";

		$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
		$sql = "SELECT FOUND_ROWS() AS `found_rows`;";
		$rows = mysql_query($sql);
		$rows = mysql_fetch_assoc($rows);
		$total_rows = $rows['found_rows'];
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$employees[] = array(
				'MaTaiSan' => $row['MaTaiSan'],
				'TenTaiSan' => $row['TenTaiSan'],
				'MaThuocTinh' => $row['MaThuocTinh'],
				'TenThuocTinh' => $row['TenThuocTinh'],
				'GiaTriThuocTinh' => $row['GiaTriThuocTinh']
			  );
		}
		 
		$data[] = array(
		   'TotalRows' => $total_rows,
		   'Rows' => $employees
		);
		echo json_encode($data);
	}
?>