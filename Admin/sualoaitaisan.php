<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select * from `loaitaisan_thietbi`";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['txt_tenloaitaisansua'])
				{
					echo 2;//ten don vi da ton tai
					exit;
				}
			}
			$sql="update `loaitaisan_thietbi`";
			$sql.="set `TenLoai` = '".$_POST['txt_tenloaitaisansua']."',`DienGiaiTB` = '".$_POST['txt_diengiaisua']."'";
			$sql.="where `MaLoai` = '".$_POST['cbo_tenloaitaisansua']."'";
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