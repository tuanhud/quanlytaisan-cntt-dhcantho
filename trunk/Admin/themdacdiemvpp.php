<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			$isExist = 0;
			include_once('../database.php');
			$db=new database();		
					$sql = "insert into codd values('".$_POST['cbo_tenvppthem']."','".$_POST['cbo_dacdiemvppthem']."','".$_POST['txt_ghichuddvppthem']."')";
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