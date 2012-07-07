<?php
	#Include the connect.php file
	include('connect.php');
	include('../database.php');
	$db=new database();
	$isExits=0;
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
		$sql="SELECT * FROM thuocphieumau";
		$db->setQuery($sql);
		$result = $db->fetchAll();
		while($row=mysql_fetch_array($result)){
				$maphieu=$row[0];
				$mand=$row[1];
				if($maphieu==$_GET['maphieu'] && $mand==$_GET['mand']){
						$isExits=1;
					}
			}
			if($isExits==0){
				 $update_query1 = "INSERT INTO thuocphieumau VALUES('".$_GET['maphieu']."','".$_GET['mand']."')";
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
			}
	}
?>