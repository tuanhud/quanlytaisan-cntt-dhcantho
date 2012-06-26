<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	header( "content-type: text/xml" );
	//kiem tra dã dang nh?p
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	//{
			include_once('../database.php');
			$db=new database();			
					$db->setQuery('SELECT  MaND, TenND, GhiChuND FROM noidung');
					$result=$db->fetchAll();
					 $stt=1;		
					while($row=mysql_fetch_array($result))
					{	
					$data[]=array(														
						'mand'=>$row['MaND'],
						'tennd'=>$row['TenND'],
						'ghichu'=>$row['GhiChuND'],
						);
					}					
				echo json_encode($data);
	//}
?>