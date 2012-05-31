<?php
	//khoi dong sesion
    session_start();
	//kiem tra đã đăng nhập
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$db=new database();			
			if($_POST['cbo_chonnamxoa']!=-1 && $_POST['cbo_chondonvixoa']!=-1){		
					$db->setQuery("delete from `sotiencap` where Nam='".$_POST['cbo_chonnamxoa']."' and MSDV='".$_POST['cbo_chondonvixoa']."'");
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