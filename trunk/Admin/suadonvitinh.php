<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select tendonvitinh from donvitinh";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[0]==$_POST['txt_tendonvitinhsua'])
				{
					echo 2;//ten don vi da ton tai
					exit;
				}
			}
			$sql="update donvitinh ";
			$sql.="set `tendonvitinh` = '".$_POST['txt_tendonvitinhsua']."'";
			$sql.="where `tendonvitinh` = '".$_POST['cbo_tendonvitinhsua']."'";
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