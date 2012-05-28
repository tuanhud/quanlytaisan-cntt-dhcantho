<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql.="update`nguoidung` set `MSDV` = '".$_POST['cbo_tendonvisua']."', `TenCB`='".$_POST['txt_tencanbosua']."',`Gioitinh`='".$_POST['cbo_gioitinhsua']."', `NgaySinh`='".$_POST['cbo_ngaysinhsua']."', `ThangSinh`='".$_POST['cbo_thangsinhsua']."', `NamSinh`='".$_POST['cbo_namsinhsua']."', `Email`='".$_POST['txt_emailsua']."', `DiaChi`='".$_POST['txt_diachisua']."', `SDT`='".$_POST['txt_sodienthoaisua']."', `MatKhau`='".$_POST['txt_matkhausua']."' where `MSCB` = '".$_POST['cbo_macanbosua']."'";
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