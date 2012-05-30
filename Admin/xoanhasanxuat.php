<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();			
			if($_POST['cbo_mansxxoa']!="-Chọn mã nhà sản xuất-"){		
					$db->setQuery("delete from `nhasanxuat` where mansx='".$_POST['cbo_mansxxoa']."'");
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
			else
			{
						echo 2;
						exit;
			}
	}
?>