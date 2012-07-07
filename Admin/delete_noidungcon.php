<?php
	#Include the connect.php file
	include('connect.php');
	include_once('../database.php');
	$isExist=0;
	#Connect to the database
	//connection String
	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
	if (isset($_GET['delete']))
	{
		// DELETE COMMAND
/*		$db=new database();			
		$sql="SELECT * FROM `thuocphieumau`";
		$db->setQuery($sql);
		$result2=$db->fetchAll();
		while($row = mysql_fetch_array($result2))
			{
				$MaPhieu=$row[0];
				$MaND=$row[1];
			if($MaPhieu==$_GET['MaPhieu'] && $MaND==$_GET['MaND'])
					$isExist = 1;
			}
		if($isExist==1){*/
		$delete_query = "DELETE FROM `noidungcon` WHERE `Noi_MaND`='".$_GET['manoidungcon']."' AND `MaND`='".$_GET['manoidunglon']."'";
		 $result = mysql_query($delete_query) or die("SQL Error 1: " . mysql_error());
		 echo $result;
	/*	}else{
			
				exit;
			}*/
	}
?>