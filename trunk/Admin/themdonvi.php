<?php
    session_start();
	/*if(!session_is_registered("maquyen") || $_SESSION['maquyen']!="AD")
	{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	echo "<script language=javascript>window.location = 'index.php';</script>"; 
	exit;
	}*/
			include('../database.php');
			$db=new database();
			$sql = "Select max(MSDV) from donvi";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$ma = $row[0]+1;
			$sql = "insert into donvi values('".$ma."', '".$_POST['txt_tendonvithem']."')";
			$db->setQuery($sql);
			//echo $maloaisach;
					if($db->executeQuery()!=1)
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