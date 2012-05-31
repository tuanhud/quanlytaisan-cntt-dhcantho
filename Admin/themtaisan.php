<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();
			$sql = "Select TenTaiSan from taisan";			
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[0]==$_POST['txt_tentaisanthem'])
				{
					echo 2;
					exit;	
				}
			}
			$sql = "Select max(MaTaiSan) from taisan";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$ma = $row[0]+1;
			
			$sql = "insert into taisan values('".$ma."','".$_POST['cbo_donvitinhthem']."', '".$_POST['cbo_tenloaitaisanthem']."', '".$_POST['txt_tentaisanthem']."', '".$_POST['txt_tinhtrangthem']."')";
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
?>