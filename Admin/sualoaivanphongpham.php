<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select tenloaivpp from loaivanphongpham";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[0]==$_POST['txt_tenloaivppsua'])
				{
					echo 2;//ten don vi da ton tai
					exit;
				}
			}
			$sql="update loaivanphongpham ";
			$sql.="set `tenloaivpp` = '".$_POST['txt_tenloaivppsua']."'";
			$sql.=",`diengiaivpp` = '".$_POST['txt_diengiailoaivppsua']."'";
			$sql.="where `Maloaivpp` = '".$_POST['cbo_tenloaivppsua']."'";
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