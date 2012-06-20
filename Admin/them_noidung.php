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
	if (isset($_GET['insert']))
	{
		//insert phieu du toan vpp
		$sql = "Select max(MaPhieu) from phieumau";
		$db->setQuery($sql);
		$result = $db->fetchAll();
		$row = mysql_fetch_array($result,MYSQL_NUM);
		$ma = $row[0];
		 $insert_query1 = "INSERT INTO thuocphieumau VALUES('".$ma."','".$_GET['mand']."')";
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
	}
?>