<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();	
			$sql = "Select * from noidungcon";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			while($row = mysql_fetch_array($result))
			{
			$manoidungcon=$row[0];
			$manoidunglon=$row[1];
			if($manoidunglon==$_POST['cbo_tennoidunglon'] && $manoidungcon==$_POST['cbo_tennoidungconmoi'])
					$isExist = 2;
			}
			$sql="update noidungcon ";
			$sql.="set `noi_mand` = '".$_POST['cbo_tennoidungconmoi']."'";
			$sql.="where `mand` = '".$_POST['cbo_tennoidunglon']."'";
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