<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();
			$sql="select TenThuocTinh, GhiChu from thuoctinh";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row['TenThuocTinh']==$_POST['txt_tenthuoctinhsua']&&$row['GhiChu']==$_POST['txt_ghichusua'])
				{
					echo 2;//chua thay doi gi ca
					exit;
				}
			}
			$sql="update `thuoctinh`";
			$sql.="set `TenThuocTinh` = '".$_POST['txt_tenthuoctinhsua']."',`GhiChu` = '".$_POST['txt_ghichusua']."'";
			$sql.="where `MaThuocTinh` = '".$_POST['cbo_tenthuoctinhsua']."'";
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