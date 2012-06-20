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
		$sql = "Select max(MaPhieu) from phieumau";
		$db->setQuery($sql);
		$result = $db->fetchAll();
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$ma = $row[0]+1;
		$current = getdate(); 
		$current_date = $current['mday'].'/'.$current['mon'].'/'.$current['year']; 
		// INSERT COMMAND 
		//insert vao bảng phieumau
		 $insert_query1 = "insert into `phieumau` values('".$ma."','".$_GET['tenphieumau']."','".$_GET['ghichu']."','".$_GET['ngay']."','".$_GET['thang']."','".$_GET['nam']."','".$current_date."',0)";
		 $result = mysql_query($insert_query1) or die("SQL Error 1: " . mysql_error());
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