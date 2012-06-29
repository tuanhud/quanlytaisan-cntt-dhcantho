<?php
session_start();
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
		
		$update_query = "UPDATE `thuockhms` SET
		`SoLuong`='".$_GET['SoLuong']."',
		`DonGiaMuaSam`='".$_GET['DonGia']."'
		 WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' and `MaKHMS`='".$_GET['MaKHMS']."'";
		 $result = mysql_query($update_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `thuockhms` WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' AND `MaKHMS`='".$_GET['MaKHMS']."'";
		$result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
?>