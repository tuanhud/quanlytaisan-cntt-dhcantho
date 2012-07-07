<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();			
			if($_POST['cbo_tenphieumauxoa']!=-1){		
					$db->setQuery("delete from `phieumau` where maphieu='".$_POST['cbo_tenphieumauxoa']."'");
					$db->executeQuery();
					$db->setQuery("delete from `thuocphieumau` where maphieu='".$_POST['cbo_tenphieumauxoa']."'");
					$db->executeQuery();
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