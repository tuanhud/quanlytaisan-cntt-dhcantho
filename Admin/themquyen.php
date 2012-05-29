<?php
	//khoi dong sesion
    session_start();
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
				if($row[1]==$_POST['txt_tenquyen'])
				{
					echo 2;
					exit;	
				}
			}
					$sql = "Select max(MaQuyen) from quyen";
					$db->setQuery($sql);
					$result = $db->fetchAll();
					$row = mysql_fetch_array($result,MYSQL_NUM);
					$ma = $row[0]+1;
					
					$sql = "insert into quyen values('".$ma."', '".$_POST['txt_tenquyen']."','".$_POST['txt_diengiai']."')";
					$db->setQuery($sql);
					if($db->executeQuery()!=1)
					{
						echo 0;
						exit;
					}
					else
					{
						echo 1;
						exit;
					}
	}
?>