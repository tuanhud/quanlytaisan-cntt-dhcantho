<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql="update `vanphongpham`";
			$sql.="set `maloaivpp` = '".$_POST['cbo_tenloaivppsua']."',`tendonvitinh` = '".$_POST['cbo_dvtsua']."', `mansx` = '".$_POST['cbo_tennsxsua']."', `tenvpp` = '".$_POST['txt_tenvppsua']."'";
			$sql.="where `Mavpp` = '".$_POST['cbo_tenvppsua']."'";
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