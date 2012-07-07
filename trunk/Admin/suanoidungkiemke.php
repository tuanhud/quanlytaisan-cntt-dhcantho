<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select TenND from noidung";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				$tennoidungkiemke=strtolower($row[1]);
			   if($tennoidungkiemke==strtolower($_POST['txt_tennoidungkiemkemoi']))
			   {
					echo 2;//ten don vi da ton tai
					exit;
				}
			}
			$sql="update noidung set `tendonvitinh` = '".$_POST['cbo_tendonvitinhsua']."', `tennd` = '".$_POST['txt_tennoidungkiemkemoi']."', `ghichund` = '".$_POST['txt_ghichusua']."' where `mand` = '".$_POST['cbo_tennoidungkiemkesua']."'";
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