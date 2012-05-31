<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			
			$sql="update sotiencap ";
			$sql.="set `SoTien` = '".$_POST['txt_sotiencap']."'";
			$sql.="where `nam` = '".$_POST['cbo_chonnamsua']."' and `MSDV` = '".$_POST['cbo_chondonvisua']."'";
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