<?php
	#Include the connect.php file
	include('connect.php');
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
				$current = getdate(); 
				$current_date = $current['year'].'/'.$current['mday'].'/'.$current['mon']; 
				//echo $current_date;
				// INSERT COMMAND 
				//update vao bảng phieumau
				 $update_query1 = "update `phieumau` set TenPhieu='".$_GET['tenphieumaumoi']."',GhiChuPhieu='".$_GET['ghichu']."',NgayLap='".$_GET['ngay']."',ThangLap='".$_GET['thang']."',NamLap='".$_GET['nam']."',CapNhatMoiNhat='".$current_date."' WHERE MaPhieu='".$_GET['maphieu']."'";
				 $result = mysql_query($update_query1) or die("SQL Error 1: " . mysql_error());
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
?>