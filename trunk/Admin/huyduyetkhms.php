<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql2 = 'update sotiencap set SoTien ="'.$_POST['tiencon1'].'" where MSDV = "'.$_POST['cbo_chondonvi'].'" and Nam = "'.$_POST['cbo_nam'].'"';
			$db->Execute($sql2);
			$sql="update `kehoachmuasam`";
			$sql.="set `DuyetKhoa` = '0'";
			$sql.="where `MaKHMS` = '".$_POST['cbo_makhms']."'";
			$db->setQuery($sql);
			if($db->executeQuery()!=1)
			{
						echo 0;//sua that bai
						exit;
			}
			else
			{
						echo 1;//sua thanh cong
						exit;
			}
	}
?>