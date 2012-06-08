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
			$sql="delete from `phieudutoanvpp` where `Maphieudutoan` = '".$_POST['cbo_maphieuhuy']."'";
			$sql1="delete from `covpp` where `MaPhieuDuToan` = '".$_POST['cbo_maphieuhuy']."'";
			$sql2="delete from `thuocquyvpp` where `thuocquyvpp`.`MaPhieuDuToan`  = '".$_POST['cbo_maphieuhuy']."' and `thuocquyvpp`.`quy`='".$_POST['cbo_quyhuy']."'";
			$db->setQuery($sql);
			$db1->setQuery($sql1);
			$db2->setQuery($sql2);
			if(($db->executeQuery()!=1) || ($db1->executeQuery()!=1) || ($db2->executeQuery()!=1))
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