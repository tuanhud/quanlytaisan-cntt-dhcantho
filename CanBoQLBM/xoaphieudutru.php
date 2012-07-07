<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include('../database.php');
			$db=new database();	
			$db1=new database();
			$db2=new database();
			$ma=$_GET['maphieu'];
			$sql="delete from `phieudutoanvpp` where `Maphieudutoan` = '".$ma."'";
			$sql1="delete from `covpp` where `MaPhieuDuToan` = '".$ma."'";
			$sql2="delete from `thuocquyvpp` where MaPhieuDuToan ='".$ma."'";
			
			$db1->setQuery($sql1);
			$db2->setQuery($sql2);
			$gt2=$db1->executeQuery();
			$gt3=$db2->executeQuery();
			$db->setQuery($sql);
			$gt1=$db->executeQuery();
	}
?>