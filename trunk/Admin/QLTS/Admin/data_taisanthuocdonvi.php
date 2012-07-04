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
	else if (isset($_GET['delete']))
	{
		// DELETE COMMAND 
		$delete_query = "DELETE FROM `taisanthuocdonvi` WHERE `MaTaiSan`='".$_GET['MaTaiSan']."' AND `MSDV`='".$_GET['MSDV']."'";
		 $result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	}
?>