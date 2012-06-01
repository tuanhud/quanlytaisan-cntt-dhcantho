<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();
			$sql = "Select MSCB from nguoidung";			
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['txt_masocanbo'])
				{
					echo 2;
					exit;	
				}
			}
			$sql = "insert into nguoidung values('".$_POST['txt_masocanbo']."', '".$_POST['cbo_tendonvithem']."', '".$_POST['txt_tencanbo']."', '".$_POST['cbo_gioitinh']."', '".$_POST['cbo_ngaysinh']."', '".$_POST['cbo_thangsinh']."', '".$_POST['cbo_namsinh']."','".$_POST['txt_email']."', '".$_POST['txt_diachi']."', '".$_POST['txt_sodienthoai']."', '".$_POST['txt_matkhau']."')";
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