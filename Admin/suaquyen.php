<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select * from quyen";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
				if($row[1]==$_POST['txt_tenquyensua']&&$row[2]==$_POST['txt_diengiaisua'])
				{
					echo 2;//ten don vi da ton tai
					exit;
				}
			}
			$sql="update `quyen`";
			$sql.="set `TenQuyen` = '".$_POST['txt_tenquyensua']."',`DienGiaiQuyen` = '".$_POST['txt_diengiaisua']."'";
			$sql.="where `MaQuyen` = '".$_POST['cbo_tenquyensua']."'";
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