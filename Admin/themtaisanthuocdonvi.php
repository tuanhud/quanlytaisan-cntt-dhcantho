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
	else
	{
		$insert_query = "insert into `taisanthuocdonvi` values('".$_GET['MSDV']."','".$_GET['MaTaiSan']."','".$_GET['SoLuongCuaDonVi']."','".$_GET['DonGiaTS']."')";
		 $result = mysql_query($insert_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
?>