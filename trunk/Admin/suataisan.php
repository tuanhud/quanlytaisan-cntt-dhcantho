<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select TenDonViTinh, TenTaiSan, TinhTrang from taisan";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[0]==$_POST['cbo_donvitinhsua']&&$row[1]==$_POST['txt_tentaisansua']&&$row[2]==$_POST['txt_tinhtrangsua'])
				{
					echo 2;//ten don vi da ton tai
					exit;
				}
			}
			$sql="update `taisan`";
			$sql.="set `TenDonViTinh` = '".$_POST['cbo_donvitinhsua']."',`TenTaiSan` = '".$_POST['txt_tentaisansua']."', `TinhTrang` = '".$_POST['txt_tinhtrangsua']."'";
			$sql.="where `MaTaiSan` = '".$_POST['cbo_tentaisansua']."'";
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