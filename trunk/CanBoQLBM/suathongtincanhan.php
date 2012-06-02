<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			
			$sql.="update`nguoidung` set `TenCB`='".$_POST['txt_tencanbo']."',`Gioitinh`='".$_POST['cbo_gioitinh']."', `NgaySinh`='".$_POST['cbo_ngaysinh']."', `ThangSinh`='".$_POST['cbo_thangsinh']."', `NamSinh`='".$_POST['cbo_namsinh']."', `Email`='".$_POST['txt_email']."', `DiaChi`='".$_POST['txt_diachi']."', `SDT`='".$_POST['txt_sodienthoai']."', `MatKhau`='".$_POST['txt_matkhau']."' where `MSCB` = '".$_POST['txt_masocanbo']."'";
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