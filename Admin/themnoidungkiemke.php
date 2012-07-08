<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();
			$sql = "Select * from noidung";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
			$tennoidungkiemke=strtolower($row[2]);
			if($tennoidungkiemke==strtolower($_POST['txt_tennoidungkiemke']))
					$isExist = 1;
			}
			if($isExist==0)
			{
					$sql = "Select max(mand) from noidung";
					$db->setQuery($sql);
					$result = $db->fetchAll();
					$row = mysql_fetch_array($result,MYSQL_NUM);
					$temp = $row[0]+1;
					$ma="ND"+$temp;
					$sql = "insert into noidung values('".$ma."', '".$_POST['cbo_tendonvitinhthem']."','".$_POST['txt_tennoidungkiemke']."','".$_POST['txt_ghichu']."')";
					$db->setQuery($sql);
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
			}
			else
			{
						echo 2;
						exit;
				}
	}
?>