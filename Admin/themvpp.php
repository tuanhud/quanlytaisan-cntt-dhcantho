<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();
			$sql = "Select max(Mavpp) from vanphongpham";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			$row = mysql_fetch_array($result,MYSQL_NUM);
			$ma = $row[0]+1;
			
			$sql = "insert into vanphongpham values('".$ma."','".$_POST['cbo_tenloaivppthem']."', '".$_POST['cbo_dvtthem']."', '".$_POST['cbo_tennsxthem']."', '".$_POST['txt_tenvppthem']."','".$_POST['txt_dongiavppthem']."')";
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